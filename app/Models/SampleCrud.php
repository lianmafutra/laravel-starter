<?php

namespace App\Models;

use App\Utils\LmFileTrait;
use App\Utils\Rupiah;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleCrud extends Model
{
   use LmFileTrait;
   use HasFactory;
   protected $table = 'sample';
   protected $guarded = [];

   protected $appends = [
      'price_format'
  ];

   protected  $casts = [
      'start_date'       => 'datetime:d/m/Y',
      'end_date'         => 'datetime:d/m/Y',
      'date_publisher'   => 'datetime:d/m/Y',
      'date_publisher'   => 'datetime:d/m/Y',
      'date_range_start' => 'datetime:d/m/Y',
      'date_range_end'   => 'datetime:d/m/Y',
   ];

   protected function priceFormat(): Attribute
   {
      return Attribute::make(
         get: fn () => Rupiah::toRupiah($this->attributes['price']),
     );
   }
}
