<?php

namespace App\Models;

use App\Utils\LmFileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Spatie\ResponseCache\Facades\ResponseCache;
use Storage;

class User extends Authenticatable
{
   use HasFactory, Notifiable;
   use HasRoles;
   use LmFileTrait;

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

   public static function boot()
   {
      parent::boot();
      self::created(function () {
         ResponseCache::forget(route('master-user.index'));
      });

      self::updated(function () {
         ResponseCache::forget(route('master-user.index'));
      });

      self::deleted(function () {
         ResponseCache::forget(route('master-user.index'));
      });
   }
   

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
