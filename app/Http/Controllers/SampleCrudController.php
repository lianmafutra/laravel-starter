<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleCrudRequest;
use App\Models\PermissionGroup;
use App\Models\SampleCrud;
use App\Utils\ApiResponse;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


class SampleCrudController extends Controller
{
   use ApiResponse;

   public function index()
   {

      $data = DB::table('permissions')
         ->select('permissions.*', 'permission_group.name as group', 'permissions.name as name')
         ->leftJoin('permission_group', 'permission_group.id', '=', 'permissions.permission_group_id');
      $groupIndex = PermissionGroup::get();
      if (request()->ajax()) {
         return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
               return view('admin.permissions.action', compact('data'));
            })
            ->editColumn('created_at', function ($data) {
               return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y h:i:s');
            })
            ->editColumn('guard_name', function ($data) {
               if ($data->guard_name == 'web') {
                  return   '<span class="badge badge-primary">' . $data->guard_name . '</span>';;
               } elseif ($data->guard_name == 'api') {
                  return   '<span class="badge badge-warning">' . $data->guard_name . '</span>';;
               }
            })
            ->rawColumns(['action', 'guard_name'])
            ->make(true);
      }
      return view('admin.sample.index', compact('data', 'groupIndex'));
   }


   public function create()
   {
      return view('admin.sample.create');
   }


   public function store(SampleCrudRequest $request)
   {
      try {


         DB::beginTransaction();

         $sampleCrud = SampleCrud::updateOrCreate(
            ['id' => $request->sample_id],
            $request->safe()->except('date_range', 'file_cover', 'file_cover_multi', 'file_pdf')
         );

         $sampleCrud
            ->addFile($request->file_pdf)
            ->path("file_pdf")
            ->field("file_pdf")
            ->extension(['pdf'])
            ->updateFile();

         $sampleCrud
            ->addFile($request->file_cover)
            ->path("cover")
            ->field("file_cover")
            ->extension(['jpg', 'png'])
            ->withThumb(100)
            ->compress(60)
            ->updateFile();


         $sampleCrud
            ->addFile($request->file_cover_multi)
            ->path("cover_multi")
            ->field("file_cover_multi")
            ->extension(['jpg', 'png'])
            ->withThumb(100)
            ->compress(60)
            ->updateFile();

         DB::commit();
         return $this->success(__('trans.crud.success'));
      } catch (\Throwable $th) {
         DB::rollBack();
         return $this->error(__('trans.crud.error') . $th, 400);
      }
   }

   public function show(SampleCrud $sampleCrud)
   {
      //
   }

   public function edit(SampleCrud $sampleCrud)
   {
      return view('admin.sample.edit', compact('sampleCrud'));
   }

   public function update(Request $request, SampleCrud $sampleCrud)
   {
      //
   }


   public function destroy(SampleCrud $sampleCrud)
   {
      //
   }
}
