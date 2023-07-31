<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\LmFile;
use App\Utils\uploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
   public function index()
   {
      $x['title']     = 'User';
      $x['data']      = User::get();
      $x['role']      = Role::get();
      return view('admin.user', $x);
   }

   public function show($user_id){
     
      $user = User::find($user_id);
      return view('admin.profile.index', compact('user'));
   }

   public function profile()
   {
    
      $x['title']     = 'Profile';
      $user = User::with('bidang')->find(auth()->user()->id);
      return view('admin.profile.index', $x, compact('user'));
   }

   public function update(Request $request)
   {
      try {
         $user = User::find(auth()->user()->id);
         $user->nama_lengkap = $request->nama_lengkap;
         $user->kontak = $request->kontak;
         $user->email = $request->email;
         $user->jenis_kelamin = $request->jenis_kelamin;
         $user->alamat = $request->alamat;
         $user->save();
         DB::commit();
         return redirect()->back()->with('success', __('trans.crud.success'));
      } catch (\Throwable $th) {
         DB::rollback();
         return redirect()->back()->with('error', __('trans.crud.error'));
      }
      return back();
   }

   public function changePhoto(Request $request, LmFile $uploadFile)
   {
      try {
         $files = $request->file('foto');

         $data = User::where('id', auth()->user()->id)->first();

         if ($data->foto == null) {
            $data->foto = $files  ? Str::uuid()->toString() : NULL;
         }
         $data->save();


         $data->file($files)
         ->field("foto")
         ->path("profile")
         ->withThumb(100)
         ->upload();
         

         DB::commit();
         return redirect()->back()->with('success', __('trans.crud.success'));
      } catch (\Throwable $th) {
         DB::rollback();
         return redirect()->back()->with('error', __('trans.crud.error'). $th);
      }
      return back();
   }

   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'username'     => ['required', 'string', 'max:255', 'unique:users'],
         'password'  => ['required', 'string'],
         'role'      => ['required']
      ]);
      if ($validator->fails()) {
         return back()->withErrors($validator)
            ->withInput();
      }
      DB::beginTransaction();
      try {
         $user = User::create([
            'username'      => $request->username,
            'password'  => bcrypt($request->password)
         ]);
         $user->assignRole($request->role);
         DB::commit();
         Alert::success('Pemberitahuan', 'Data <b>' . $user->username . '</b> berhasil dibuat')->toToast()->toHtml();
      } catch (\Throwable $th) {
         DB::rollback();

         Alert::error('Pemberitahuan', 'Data <b>' . $request->username . '</b> gagal dibuat : ')->toToast()->toHtml();
      }
      return back();
   }

   public function destroy(Request $request)
   {
      try {
         $user = User::find($request->id);
         $user->delete();
         Alert::success('Pemberitahuan', 'Data <b>' . $user->name . '</b> berhasil dihapus')->toToast()->toHtml();
      } catch (\Throwable $th) {
         Alert::error('Pemberitahuan', 'Data <b>' . $user->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
      }
      return back();
   }
}
