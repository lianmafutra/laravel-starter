<?php

namespace App\Utils\LmFile;

use Intervention\Image\Facades\Image;
use Storage;

class GenerateThumbnail
{
   public function run($requestFile, $size, $path){

      $thumbImage = Image::make($requestFile->getRealPath());
      $thumbImage->resize(null, $size, function ($constraint) {
         $constraint->aspectRatio();
      });
      $thumbImage->stream();
      Storage::disk('public')->put($path, $thumbImage);
      return true;
   }
}
