<?php

namespace App\Utils\LmFile;

use Image;

class CompressImage
{
   public function run($requestFile, $compressValue)
   {
      if (in_array(strtolower($requestFile->getClientOriginalExtension()), ['jpg', 'png', 'jpeg', 'bmp', 'gif'])) {
         $fileIntv =  Image::make($requestFile->getRealPath());
         $imgWidth =  $fileIntv->width();
         $imgWidth -= $imgWidth * $compressValue / 100;
         $fileIntv = $fileIntv->resize($imgWidth, null, function ($constraint) {
            $constraint->aspectRatio();
         });
         return $fileIntv->stream();
      }
   }
}
