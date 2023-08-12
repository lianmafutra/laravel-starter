<?php

namespace App\Utils\LmFile;

use Exception;
use Intervention\Image\Facades\Image;
use Storage;


class GenerateThumbnail
{
   public function run($requestFile, $size, $path)
   {
   
      try {
         if (in_array(strtolower($requestFile->getClientOriginalExtension()), ['jpg', 'png', 'jpeg', 'bmp', 'gif'])) {
           
            $thumbImage = Image::make($requestFile->getRealPath());

            $thumbImage->resize(null, $size, function ($constraint) {
               $constraint->aspectRatio();
            });
            $thumbImage->stream();
            Storage::disk('public')->put($path, $thumbImage);
            return true;
         }
      } catch (\Throwable $th) {
         throw new Exception("error : " . $th, 1);
      }
   }
}
