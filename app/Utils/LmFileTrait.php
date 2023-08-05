<?php

namespace App\Utils;

use App\Models\File as ModelsFile;
use App\Utils\LmFile\GeneratePath;
use RahulHaque\Filepond\Facades\Filepond;
use Str;

trait LmFileTrait
{

   protected $file = null;
   protected $path = "";
   protected $field = "";
   protected $liveServer = false;
   protected $custom_path = "";


   public function addFile($file)
   {
      $this->file =  $file;
      return $this;
   }

   public function path(string $path)
   {
      $this->path =  $path;
      $this->custom_path = (new GeneratePath())->get($path);
      return $this;
   }

   public function field(string $field)
   {
      $this->field =  $field;
      return $this;
   }

   public function liveServer()
   {
      $this->liveServer =  true;
      return $this;
   }

   public function fileAttribute( $fileRequest)
   {
      $name_origin = $fileRequest->getClientOriginalName();
      $name_uniqe  = RemoveSpace::removeDoubleSpace(Str::random(15));
      $name_file_with_extension  = $name_uniqe . '.' . strtolower($fileRequest->getClientOriginalExtension());
      $thumb_file_with_extension = $name_uniqe . '-thumb.' . $fileRequest->getClientOriginalExtension();
      $mime = $fileRequest->getMimeType();
      $size = $fileRequest->getSize();

      return collect([
         'name_origin'               => $name_origin,
         'mime'                      => $mime,
         'size'                      => $size,
         'name_uniqe'                => $name_uniqe,
         'name_file_with_extension'  => $name_file_with_extension,
         'custom_path'               => $this->custom_path,
         'thumb_file_with_extension' => $thumb_file_with_extension,
         'thumb_file_with_extension' => $thumb_file_with_extension,

      ]);
   }

   public function storeFileSingle()
   {
      $file_uuid = Str::uuid(); // UUID always generate new upload image
      $fileAttribute = $this->fileAttribute(Filepond::field($this->file)->getFile());

      if ($this->liveServer()) {
         Filepond::field($this->file)->moveTo(
            $this->custom_path .
               $fileAttribute->get('name_file_with_extension')
         );
      }

      $this->getModel()->update([
         $this->field => $file_uuid
      ]);

      ModelsFile::create([
         'file_id'     => $file_uuid,
         'model_id'    => $this->getModel()->id,
         'name_origin' => $fileAttribute->get('name_origin'),
         'name_hash'   => $fileAttribute->get('name_file_with_extension'),
         'path'        => $this->custom_path,
         'created_by'  => auth()->user()->id,
         'mime'        => $fileAttribute->get('mime'),
         'order'       => 1,
         'size'        => $fileAttribute->get('size'),
      ]);
   }

   public function storeFileMultiple()
   {
      $file_uuid = Str::uuid(); // UUID always generate new upload image
      $fileRequestArray = Filepond::field($this->file)->getFile();

      $arrayFileServer = $this->file;

      //  store file from array server if filopond to custom path directori
      foreach ($arrayFileServer as $key => $value) {
         if ($this->liveServer()) {
            Filepond::field($value)->moveTo(
               $this->custom_path . $value
            );
         }
      }

      //  store data to table file
      foreach ($fileRequestArray as $key => $value) {
         $fileAttribute = $this->fileAttribute($value);
         $this->getModel()->update([
            $this->field => $file_uuid
         ]);

         ModelsFile::create([
            'file_id'     => $file_uuid,
            'model_id'    => $this->getModel()->id,
            'name_origin' => $fileAttribute->get('name_origin'),
            'name_hash'   => $fileAttribute->get('name_file_with_extension'),
            'path'        => $this->custom_path,
            'created_by'  => auth()->user()->id,
            'mime'        => $fileAttribute->get('mime'),
            'order'       => $key + 1,
            'size'        => $fileAttribute->get('size'),
         ]);
      }
   }

   public function storeFile()
   {
      if (is_array(Filepond::field($this->file)->getFile())) {
         $this->storeFileMultiple();
      } else {
         $this->storeFileSingle();
      }
   }
}
