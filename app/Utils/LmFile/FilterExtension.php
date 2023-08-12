<?php

namespace App\Utils\LmFile;

use Exception;
use Illuminate\Http\File;

class FilterExtension
{
   public function run($file, array $allowExtensions)
   {

      if (is_array($file)) {
       
         foreach ($file as $key => $value) {
            if (!in_array(strtolower(strtolower($value->getClientOriginalExtension())), $allowExtensions)) {
              
               throw new Exception("Extension File not Allowed", 1);
            }
            return true;
         }
      } else {
         if (!in_array(strtolower($file->getClientOriginalExtension()), $allowExtensions)) {
            throw new Exception("Extension File not Allowed", 1);
         }
         return true;
      }
   }
}
