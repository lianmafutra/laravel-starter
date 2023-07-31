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

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string|null $email
 * @property string|null $nama_lengkap
 * @property string|null $kontak
 * @property string|null $alamat
 * @property string|null $bio
 * @property string|null $jenis_kelamin
 * @property string|null $status
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $nama
 * @property string|null $foto
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File $file_foto
 * @property-read mixed $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKontak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
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
