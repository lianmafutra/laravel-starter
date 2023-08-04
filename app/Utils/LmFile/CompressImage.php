<?php

namespace App\Utils\LmFile;

use Image;

class CompressImage
{
   public function run($file, $compressValue)
   {
      $fileIntv =  Image::make($file->getRealPath());
      $imgWidth =  $fileIntv->width();
      $imgWidth -= $imgWidth * $compressValue / 100;
      $fileIntv = $fileIntv->resize($imgWidth, null, function ($constraint) {
         $constraint->aspectRatio();
      });
      return $fileIntv->stream();
   }
}
