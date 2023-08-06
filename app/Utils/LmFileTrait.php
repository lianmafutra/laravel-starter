<?php

namespace App\Utils;

use App\Models\File as ModelsFile;
use App\Utils\LmFile\FilterExtension;
use App\Utils\LmFile\GeneratePath;
use File;
use Log;
use PgSql\Lob;
use RahulHaque\Filepond\Facades\Filepond;
use Storage;
use Str;

trait LmFileTrait
{

   protected $file = null;
   protected $path = "";
   protected $field = "";
   protected $liveServer = false;
   protected $custom_path = "";

   protected $extension = "";
   protected $filterExtension;


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
      $this->liveServer = true;
      return $this;
   }

   // allowed extension
   public function extension(array $extension)
   {
      $this->extension = $extension;
      $this->filterExtension = new FilterExtension();
      return $this;
   }

   public function checkFileExist()
   {
   }

   public function fileAttribute($fileRequest)
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
      $field = $this->field;

      if (ModelsFile::where('name_hash', basename($this->file))->count() < 1) {
         $fileAttribute = $this->fileAttribute(Filepond::field($this->file)->getFile());

         $deleteOld = ModelsFile::where('file_id', $this->getModel()->$field)->delete();

         // filter extension
         if ($this->extension) {
            $this->filterExtension->run(
               Filepond::field($this->file)->getFile(),
               $this->extension
            );
         }

         if ($this->liveServer()) {
            Filepond::field($this->file)->moveTo(
               $this->custom_path .
                  $fileAttribute->get('name_uniqe')
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
   }

   private function deleteData()
   {
      $field = $this->field;
      $filenames = [];

      foreach ($this->file as $url) {
         $filenames[] = basename($url);
      }

      $oldFiles = ModelsFile::where('file_id', $this->getModel()->$field)->pluck('name_hash');

      $filesToDelete = $oldFiles->diff($filenames);
      foreach (ModelsFile::whereIn('name_hash', $filesToDelete->toArray())->get() as $key => $value) {
         Storage::disk('public')->delete($value->path . $value->name_hash);
         ModelsFile::where('name_hash', $value->name_hash)->delete();
      }

      return $this;
   }

   public function updateFileMultiple()
   {
      $field = $this->field;

      $arrayFiles = []; //array files from form request

      $file_uuid = $this->getModel()->$field ? $this->getModel()->$field : Str::uuid();

      foreach ($this->file as $url) {
         $afterStorage = substr($url, strpos($url, 'storage/') + strlen('storage/'));
         $arrayFiles[] = $afterStorage;
      }

      foreach ($arrayFiles as $key => $value) {
         if (ModelsFile::where('name_hash', basename($this->file[$key]))->count() < 1) {

            $fileAttribute = $this->fileAttribute(Filepond::field($this->file[$key])->getFile());
            if ($this->extension) {
               // filter extension
               $this->filterExtension->run(
                  Filepond::field($this->file[$key])->getFile(),
                  $this->extension
               );
            }

            if ($this->liveServer()) {
               Filepond::field($this->file[$key])->moveTo(
                  $this->custom_path .
                     $fileAttribute->get('name_uniqe')
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
      }
   }

   public function storeFileMultiple()
   {
      $file_uuid = Str::uuid(); // UUID always generate new upload image
      $fileRequestArray = Filepond::field($this->file)->getFile();

      $arrayFileServer = $this->file;

      if ($this->extension) {
         foreach ($arrayFileServer as $key => $value) {
            // filter extension
            $this->filterExtension->run(
               Filepond::field($this->file)->getFile(),
               $this->extension
            );
         }
      }

      //  store file from array server if filopond to custom path directori


      //  store data to table file
      foreach ($fileRequestArray as $key => $value) {
         $fileAttribute = $this->fileAttribute($value);
         $this->getModel()->update([
            $this->field => $file_uuid
         ]);



         if ($this->liveServer()) {
            Filepond::field($arrayFileServer[$key])->moveTo(
               $this->custom_path .
                  $fileAttribute->get('name_uniqe')
            );
         }

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
      if (is_array($this->file)) {
         $this->storeFileMultiple();
      } else {
         $this->storeFileSingle();
      }
   }

   public function updateFile()
   {
      if (is_array($this->file)) {
         $this->updateFileMultiple();
      } else {
         $this->storeFileSingle();
      }
   }

   public function getFile()
   {

      if ($this->makeFileAttribute()->toArray()) {
         $dataCollection = [
            "source" => $this->makeFileAttribute()->toArray()[0]['full_path'],
            "options" => [
               "type" => "local",
            ]
         ];
      }
     
   }

   public function getFiles()
   {
      $dataCollection = [];
      $dataObject = [];
      foreach ($this->makeFileAttribute() as $key => $value) {
         $dataObject = [
            "source" => $value->full_path,
            "options" => [
               "type" => "local",
            ]
         ];
         array_push($dataCollection, $dataObject);
      }
      return $dataCollection;
   }

   public function makeFileAttribute()
   {
      $data = $this->field;
      $file_id = $this->getModel()->$data;
      $file = ModelsFile::where('file_id',  $file_id)->where('model_id', $this->getModel()->id)->orderBy('order', 'ASC')->get();
      $file->map(function ($item) {
         $item['full_path'] = url('storage/' . $item->path . $item->name_hash);
         return $item;
      });

      return $file;
   }
}
