<?php

namespace App\Models;

use App\Utils\LmFileTrait;
use App\Utils\Rupiah;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Deligoez\LaravelModelHashId\Traits\SavesHashId;

class SampleCrud extends Model
{
   use LmFileTrait;
   use HasFactory;
   use HasHashId;
   use SavesHashId;
   use HasHashIdRouting;

   protected $table = 'sample';
   protected $guarded = [];

   protected $hidden = ['id'];

   protected $appends = [
      'price_format'
   ];

   public function getRouteKeyName()
   {
      return 'uuid';
   }

   protected  $casts = [
      'start_date'        => 'datetime:d/m/Y',
      'end_date'          => 'datetime:d/m/Y',
      'date_publisher'    => 'datetime:d/m/Y',
      'date_publisher'    => 'datetime:d/m/Y',
      'date_range_start'  => 'datetime:d/m/Y',
      'date_range_end'    => 'datetime:d/m/Y',
      'category_multi_id' => 'array',
   ];

   // appends attirbute
   protected function priceFormat(): Attribute
   {
      return Attribute::make(
         get: fn () => Rupiah::toRupiah($this->attributes['price']),
      );
   }
}
