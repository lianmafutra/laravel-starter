<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPD extends Model
{
   use HasFactory;
    protected $table = 'opd';
    protected $guarded = [];
 
    protected $casts = [
       'created_at'  => 'date:d-m-Y H:m:s',
       'updated_at'  => 'date:d-m-Y H:m:s',
    ];
}
