<?php

namespace App\Utils;

use Carbon\Carbon;

class DateUtils
{
   public static function human($date, $minDate=2)
   {
      if ($date?->diffInHours(Carbon::now()) >= 2) {
         return Carbon::make($date)->format('d-m-y H:m:s');
      }
      return Carbon::make($date)?->diffForHumans();
   }
}
