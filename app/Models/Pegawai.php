<?php

namespace App\Models;

use App\Utils\ApiResponse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pegawai extends Model
{
   use HasFactory;
   use HasRoles;
   // use AutoUUID;
   use ApiResponse;
   protected $table = 'users';
   protected $guarded = [];
   protected $appends = [
      'fotoUrl',
   ];


   protected $casts = [
      'created_at'  => 'date:d-m-Y H:m:s',
      'updated_at'  => 'date:d-m-Y H:m:s',
   ];

   public function getFotoUrlAttribute(){
     
      if($this->foto){
         return url('storage/' . $this->path . '/' . $this->foto);
      }else{
         return asset('img/avatar2.png');
      }
     
  }

  public function getRoleName()
  {
     return $this->getRoleNames();
  }


   

}
