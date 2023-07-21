<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterUserRequest;
use App\Http\Services\Pegawai\PegawaiService;
use App\Models\OPD;
use App\Models\User;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterUserController extends Controller
{

   use ApiResponse;

   public function create()
   {
      //
   }

   public function show()
   {
      //
   }


   public function store(MasterUserRequest $request)
   {

      try {
         User::create([
            'username' => $request->username,
            'opd_id' => $request->opd_id,
            // 'name' => $request->name,
            'password' => bcrypt($request->password)
         ]);

         return $this->success('Berhasil Membuat User Baru');
      } catch (\Throwable $th) {
         return $this->error('Gagal Membuat User Baru' . $th, 400);
      }
   }

   public function edit($id)
   {
      $user = User::where('id', $id)->first();
      return $this->success('Data User OPD', $user);
   }


   public function update(MasterUserRequest $request, $id)
   {
      try {
         User::where('id', $id)->update([
            'username' => $request->username,
            'opd_id' => $request->opd_id,
         ]);

         return $this->success('Berhasil Merubah Data User');
      } catch (\Throwable $th) {
         return $this->error('Gagal Merubah Data User' . $th, 400);
      }
   }




   public function destroy($id)
   {
      //
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
         return $this->success('Berhasil Mereset Password User');
      } catch (\Throwable $th) {
         return $this->error('Gagal Mereset Password User', 400);
      }
   }
}
