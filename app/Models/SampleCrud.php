<?php

namespace App\Models;

use App\Utils\LmFileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleCrud extends Model
{
    use LmFileTrait;
    use HasFactory;
    protected $table = 'sample';
    protected $guarded = [];
    
 
  


}
