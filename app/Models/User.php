<?php

namespace App\Models;

use App\Utils\ApiResponse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use Storage;

class User extends Authenticatable implements Auditable
{
   use HasApiTokens, HasFactory, Notifiable;
   use \OwenIt\Auditing\Auditable;
   use HasRoles;
   protected $guarded = [];
   protected $hidden = [
      'password',
      'remember_token',
   ];

   protected $casts = [
      'created_at'    => 'date:d-m-Y H:m:s',
      'updated_at'    => 'date:d-m-Y H:m:s',
      'last_login_at' => 'date:d/m/Y H:m:s',
   ];

   protected $appends = [
      'role'
   ];

   public function getRoleName()
   {
      return $this->getRoleNames()[0];
   }

   public function getRoleAttribute()
   {
      return $this->getRoleNames()[0];
   }

   public function file_foto()
   {
      return $this->hasOne(File::class, 'file_id', 'foto')->withDefault();
   }

   public function checkPassword($password)
   {
      if (Hash::check($password, auth()->user()->password)) {
         return true;
      } else {
         return false;
      }
   }

   public function getUrlFoto()
   {
      $file = User::where('id', $this->attributes['id'])->with('file_foto')->whereHas('file_foto')->first()?->file_foto;
      if ($file) {
         return Storage::url($file->path . '/' . $file->name_random);
      } else {
         return asset('img/avatar2.png');
      }
   }
}
