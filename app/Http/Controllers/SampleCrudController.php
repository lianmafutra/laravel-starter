<?php

namespace App\Http\Controllers;

use App\Models\PermissionGroup;
use App\Models\SampleCrud;
use App\Utils\ApiResponse;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class SampleCrudController extends Controller
{
   use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      
      $data = DB::table('permissions')
      ->select('permissions.*','permission_group.name as group','permissions.name as name')
      ->leftJoin('permission_group', 'permission_group.id', '=','permissions.permission_group_id');

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

      return view('admin.sample.index', compact('data','groupIndex'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sample.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SampleCrud  $sampleCrud
     * @return \Illuminate\Http\Response
     */
    public function show(SampleCrud $sampleCrud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SampleCrud  $sampleCrud
     * @return \Illuminate\Http\Response
     */
    public function edit(SampleCrud $sampleCrud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SampleCrud  $sampleCrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SampleCrud $sampleCrud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SampleCrud  $sampleCrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(SampleCrud $sampleCrud)
    {
        //
    }
}
