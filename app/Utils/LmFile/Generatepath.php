<?php

namespace App\Utils\LmFile;

use Carbon\Carbon;
use File;

class GeneratePath
{
   public function get($folder)
   {
      $tahun       = Carbon::now()->format('Y');
      $bulan       = Carbon::now()->format('m');
      $custom_path = $tahun . '/' . $bulan . '/' . $folder . '/';
      $path        = storage_path('app/public/' . $custom_path);

      if (!File::isDirectory($path)) {
         File::makeDirectory($path, 0750, true, true);
      }
      return $custom_path;
   }
}
