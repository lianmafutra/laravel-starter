<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\User;
use App\Services\UserServices;
use App\Utils\ApiResponse;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role as ModelsRole;
use Storage;

class MasterPegawaiController extends Controller
{
   use ApiResponse;
   private $userServices;

   public function __construct(UserServices $userServices)
   {
      $this->userServices = $userServices;
   }


   public function index()
   {
      $x['title']    = 'Kelola Data User';

      $data = User::with('file_foto');
      $x['roles']          = ModelsRole::get();
      $x['bidang']          = Bidang::get();


      if (request()->ajax()) {
         return  datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
               return view('app.user.action', compact('data'));
            })
            ->editColumn('foto', function ($data) {
             
               if($data->file_foto->path){
                  return '<img   class="foto p-0" src="' .  Storage::url( $data->file_foto->path.'/'.$data->file_foto->name_random) . '" height="40px" width="40px"; style="object-fit: cover; padding: 0px !important;">';
               }else{
                  return '<img   class="foto p-0" src="' .  asset('img/avatar2.png') . '" height="40px" width="40px"; style="object-fit: cover; padding: 0px !important;">';
                  
               }
            })
            ->addColumn('role', function (User $data) {
               return $this->userServices->getRoleColor($data->getRoleName());
            })
            ->addColumn('bidang', function ($data) {
               if($data->bidang->nama){
                  return '<span style="background-color:#60aaebd1" class="badge badge-secondary">'.$data->bidang->nama.'</span>';
               }else{
                  return "belum ada";

               }

             
             
            })
            ->editColumn('status', function ($data) {

               if ($data->status == 'NONAKTIF') {
                  return '<span class="badge badge-danger">Nonaktif</span>';
               }
               if ($data->status == 'AKTIF') {
                  return '<span class="badge badge-primary">Aktif</span>';
               }
            })
            ->rawColumns(['action', 'foto', 'status', 'role','bidang'])
            ->make(true);
      }
      return view('app.user.index', $x);
   }


   public function store(Request $request)
   {
      try {


         $input =  $request->except('role');
         $input['password'] = bcrypt("123456");
         
        $user = User::updateOrCreate(
            ['id'               => $request->id],
            $input
         );


       User::where('id', $user->id)->first()->syncRoles($request->role);
      

         if ($request->id)  return $this->success('Berhasil Mengubah Data');
         else return $this->success('Berhasil Menginput Data');
      } catch (\Throwable $th) {
         return $this->error('Gagal, Terjadi Kesalahan' . $th, 400);
      }
   }



   public function edit(User $user)
   {
      return $this->success('Data user', $user);
   }


   public function destroy(User $user)
   {
      try {
         $user->delete();
         return redirect()->back()->with('success', 'Berhasil Hapus Data', 200);
      } catch (\Throwable $th) {
         return redirect()->back()->with('error', 'Gagal Hapus Data', 400);
      }
   }

   public function resetPassword(Request $request)
   {
      Validator::make($request->all(), [
         'password_baru' => 'required|min:5',
      ])->validate();

      try {
         User::where('id', $request->user_id)->update([
            'password' => bcrypt($request->password_baru)
         ]);
         return redirect()->back()->with('success', 'Berhasil Reset Password', 200)->send();
      } catch (\Throwable $th) {
         return redirect()->back()->with('error', 'Gagal Reset Password', 400)->send();
      }
   }

  
}
