<?php

namespace App\Utils\LmFile;

use App\Models\File;

class CleanFilepond
{



   public static function run($value)
   {


      if (is_array($value)) {
        
         foreach ($value as $key => $item) {

            if (File::where('name_hash', basename($item))->count() > 0) {
               unset($value[$key]);
            }
         }
       
         if (count($value) > 0) {
         
           return true;
         } else {
           return false;
         }
      } else {
         if (File::where('name_hash', basename($value))->count() < 1) {
            return true;
         } else {
            return false;
         }
      }
   }
}
