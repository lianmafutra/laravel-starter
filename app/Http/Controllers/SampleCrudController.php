<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleCrudRequest;
use App\Models\SampleCrud;
use App\Utils\ApiResponse;
use Carbon\Carbon;
use DB;


class SampleCrudController extends Controller
{
   use ApiResponse;

   public function index()
   {

      $data = SampleCrud::get();



      if (request()->ajax()) {
         return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('id', function ($data) {
               return $data->hashId;
            })
            ->addColumn('action', function ($data) {
               return view('admin.sample.action', compact('data'));
            })
            ->editColumn('created_at', function ($data) {
               return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y h:i:s');
            })
            ->editColumn('category_multi_id', function ($data) {
               $boldArray = array_map(function ($item) {
                  return '<button type="button" class="ml-1 btn bnt-sm btn-outline-secondary">' . $item . '</button>';
               }, $data->category_multi_id);
               $string = implode("", $boldArray);
               return $string;
            })
            ->rawColumns(['action', 'category_multi_id'])
            ->make(true);
      }
      return view('admin.sample.index', compact('data'));
   }


   public function create()
   {
      return view('admin.sample.create');
   }


   public function store(SampleCrudRequest $request)
   {
      try {

         DB::beginTransaction();

         $sampleCrud = SampleCrud::create($request->safe()->except('date_range', 'file_cover', 'file_cover_multi', 'file_pdf'));



         SampleCrud::find($sampleCrud->id)
            ->addFile($request->file_pdf)
            ->path("file_pdf")
            ->field("file_pdf")
            ->extension(['pdf'])
            ->storeFile();

            SampleCrud::find($sampleCrud->id)
            ->addFile($request->file_cover_multi)
            ->path("cover_multi")
            ->field("file_cover_multi")
            ->extension(['jpg', 'png'])
            ->withThumb(100)
            ->compress(60)
            ->storeFile();

            SampleCrud::find($sampleCrud->id)
            ->addFile($request->file_cover)
            ->path("cover")
            ->field("file_cover")
            ->extension(['jpg', 'png'])
            ->withThumb(100)
            ->compress(60)
            ->storeFile();


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

   public function update(SampleCrudRequest $request, SampleCrud $sampleCrud)
   {
      try {


         DB::beginTransaction();

         $sampleCrud->fill($request->safe()->except('date_range', 'file_cover', 'file_cover_multi', 'file_pdf'))->save();


         SampleCrud::find($sampleCrud->id)
            ->addFile($request->file_cover_multi)
            ->path("cover_multi")
            ->field("file_cover_multi")
            ->extension(['jpg', 'png'])
            ->withThumb(100)
            ->compress(60)
            ->updateFile();


         SampleCrud::find($sampleCrud->id)
            ->addFile($request->file_pdf)
            ->path("file_pdf")
            ->field("file_pdf")
            ->extension(['pdf'])
            ->updateFile();

         SampleCrud::find($sampleCrud->id)
            ->addFile($request->file_cover)
            ->path("cover")
            ->field("file_cover")
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


   public function destroy(SampleCrud $sampleCrud)
   {
      try {
         $sampleCrud->deleteWithFile();
         return redirect()->back()->with('success', config('language.alert-success.destroy'), 200);
      } catch (\Throwable $th) {
         return redirect()->back()->with('error', config('language.alert-error.destroy'), 400);
      }
   }
}
