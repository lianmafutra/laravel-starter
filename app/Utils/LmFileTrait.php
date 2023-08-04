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


   public function addFile($file)
   {
      $this->file =  $file;
      return $this;
   }

   public function path(string $path)
   {
      $this->path =  $path;
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

   public function fileAttribute()
   {
      $fileRequest = Filepond::field($this->file)->getFile();
      $name_origin = $fileRequest->getClientOriginalName();
      $name_uniqe  = RemoveSpace::removeDoubleSpace(Str::random(10));
      $custom_path = (new GeneratePath())->get($this->path);
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
         'custom_path'               => $custom_path,
         'thumb_file_with_extension' => $thumb_file_with_extension,
         'thumb_file_with_extension' => $thumb_file_with_extension,

      ]);
   }

   public function storeFile()
   {

      $file_uuid = Str::uuid();
      $fileAttribute = $this->fileAttribute();

      if ($this->liveServer()) {
         Filepond::field($this->file)->moveTo(
            $fileAttribute->get('custom_path') .
               $fileAttribute->get('name_file_with_extension')
         );
      }

      ModelsFile::create([
         'file_id'     => $file_uuid,
         'model_id'    => $this->getModel()->id,
         'name_origin' => $fileAttribute->get('name_origin'),
         'name_hash'   => $fileAttribute->get('name_file_with_extension'),
         'path'        => $fileAttribute->get('custom_path'),
         'created_by'  => auth()->user()->id,
         'mime'        => $fileAttribute->get('mime'),
         'order'       => 1,
         'size'        => $fileAttribute->get('size'),
      ]);
   }
}
