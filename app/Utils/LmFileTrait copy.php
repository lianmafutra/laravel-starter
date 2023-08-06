<?php

namespace App\Utils;

use App\Models\File;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

trait LmFileTrait
{

   protected $path;
   protected $file;
   protected $field;
   protected $multiple = false;
   protected $getFile;
   protected $getFiles;
   protected $getThumb;
   protected $withThumb = false;
   protected $compress = false;
   protected $compressValue = 0;
   protected $sizeToCompress = 40000;

   protected $withThumb_size = null;
   protected $extension = [];


   public function addFile($file)
   {
      $this->file =  $file;
      return $this;
   }

   public function extension($extension)
   {
      $this->extension = $extension;

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

   public function multiple()
   {
      $this->multiple = true;
      return  $this;
   }

   public function withThumb($size)
   {
      $this->withThumb_size = $size;
      $this->withThumb      = true;
      return  $this;
   }

   public function compress($value)
   {
      $this->compressValue = $value;
      $this->compress      = true;
      return  $this;
   }

   public function getPath($folder)
   {
      $tahun       = Carbon::now()->format('Y');
      $bulan       = Carbon::now()->format('m');
      $custom_path = $tahun . '/' . $bulan . '/' . $folder . '/';
      $path        = storage_path('app/public/' . $custom_path);

      if (!FacadesFile::isDirectory($path)) {
         FacadesFile::makeDirectory($path, 0750, true, true);
      }
      return $custom_path;
   }

   public function filterExtension($file)
   {
      if ($this->multiple) {
        foreach ($this->file as $key => $value) {
         if (!in_array( $value->getClientOriginalExtension(), $this->extension)) {
            throw new Exception("Extension File not Allowed", 1);
         }
        }
      } else {
         // filter file by extension array value
         if (!in_array($file->getClientOriginalExtension(), $this->extension)) {
            throw new Exception("Extension File not Allowed", 1);
         }
         return true;
      }
   }

   public function storeFile()
   {
      $file_uuid = Str::uuid();
      // store multiple file Array
      if ($this->multiple) {

         if (!is_array($this->file)) throw new Exception("File Type Must Array", 1);

         foreach ($this->file as $key => $value) {
            $this->filterExtension($value);
            $this->storeFileProcess($value, $key + 1,  $file_uuid);
         }
      } else {
         if (is_array($this->file)) throw new Exception("Array File not supported", 1);

         // store single file
         $this->filterExtension($this->file);
         $this->storeFileProcess($this->file, 1, $file_uuid);
      }
   }

   public function updateFile()
   {

    
      // store multiple file Array
      if ($this->multiple) {
         $this->filterExtension($this->file);
         $this->updateMultiFileProcess();
      } else {
         if (is_array($this->file)) throw new Exception("Array File not supported", 1);
       
         // store single file
         $this->filterExtension($this->file);
         $this->updateFileProcess();
      }
   }

   public function updateMultiFileProcess()
   {


      /* 
         Delete old file and tabel file, 
         Diff old file name hash with new name origin
      */
      $newFileArrayNameHash = collect($this->file)->map(function ($file) {
         return $file->getClientOriginalName();
      });

      $oldFileArrayNameHash = collect($this->getModel()->field($this->field)->getFilesAttribute())->map(function ($file) {
         return $file->name_hash;
      });

      //  Diff old file name hash with new name origin
      $filesToDelete = $oldFileArrayNameHash->diff($newFileArrayNameHash);
  

      // Delete File origin, thumb and row database
      foreach (File::whereIn('name_hash', $filesToDelete)->get() as $key => $value) {
         Storage::disk('public')->delete($value->path . $value->name_hash);
         Storage::disk('public')->delete($value->path . $this->searchThumb($value->name_hash));
         File::where('name_hash', $value->name_hash)->delete();
      }

      // $oldFileArray = $this->getModel()->field($this->field)->getFilesAttribute()->pluck('name_hash');

      // store file
      $file_id = $this->field;
      if($this->getModel()->$file_id != ""){
         $uuid = Str::uuid();
      }else{
         $uuid = $this->getModel()->$file_id;
      }
      foreach ($this->file as $key => $file) {
         if (!in_array($file->getClientOriginalName(), $oldFileArrayNameHash->toArray())) {
            $this->storeFileProcess($file, $key + 1, $uuid);
         }
      }

      return $this;
   }

   public function updateFileProcess()
   {
   
      $old_file = File::where('model_id', $this->getModel()->id)->where('name_hash', $this->file->getClientOriginalName());
    
      // delete old file data 
      if ($old_file->exists() && $this->file->getClientOriginalName() != $old_file->first()->name_hash) {   
            // delete old file origin and thumbnail
            Storage::disk('public')->delete(
               $old_file->first()->path . $old_file->first()->name_hash,
               $old_file->first()->path . $this->searchThumb($old_file->first()->name_hash),
            );
            $old_file->delete();
            $this->storeFile();
      } else {
         $this->storeFile();
      }
   }

   public function storeFileProcess($file, $order, $file_uuid)
   {

   
      $name_origin = $file->getClientOriginalName();
      $name_uniqe  = RemoveSpace::removeDoubleSpace(Str::random(10));
      $custom_path = $this->getPath($this->path);
      $name_file_with_extension  = $name_uniqe . '.' . strtolower($file->getClientOriginalExtension());
      $thumb_file_with_extension = $name_uniqe . '-thumb.' . $file->getClientOriginalExtension();

      if ($this->withThumb) {

         $this->generateThumbnail($file, 'public/' . $custom_path . $thumb_file_with_extension);
      }

      if ($this->compress) {
       
         if($file->getSize() >= $this->sizeToCompress ){
            $fileIntv =  Image::make($file->getRealPath());
            $imgWidth =  $fileIntv->width();
            $imgWidth -= $imgWidth * $this->compressValue / 100;
            $fileIntv = $fileIntv->resize($imgWidth, null, function ($constraint) {
               $constraint->aspectRatio();
            });
            $fileIntv->stream();
           Storage::put('public/' . $custom_path  . $name_file_with_extension,  $fileIntv);
         }else{
            $file->storeAs('public/' . $custom_path, $name_file_with_extension);
         }
      } else {
         $file->storeAs('public/' . $custom_path, $name_file_with_extension);
      }

      // if check file success upload store to DB

      $model = $this->getModel();
      $old_uuid = $this->field;

      $old_file = File::where('model_id', $this->getModel()->id)->where('name_hash', $this->file->getClientOriginalName());
      if ($old_file->exists() && $this->file->getClientOriginalName() != $old_file->first()->name_hash) { 
         $model->update([
            $this->field => Str::uuid()
         ]);
      }else{
         $model->update([
            $this->field => $model->$old_uuid
         ]);
      
      }
   
      File::create([
         'file_id'     => $file_uuid,
         'model_id'    => $model->id,
         'name_origin' => $name_origin,
         'name_hash'   => $name_file_with_extension,
         'path'        => $custom_path,
         'created_by'  => auth()->user()->id,
         'mime'        => $file->getMimeType(),
         'order'       => $order,
         'size'        => $file->getSize(),
      ]);

      return $this;
   }


   public function generateThumbnail($file, $path)
   {
      $thumbImage = Image::make($file->getRealPath());
      $thumbImage->resize(null, $this->withThumb_size, function ($constraint) {
         $constraint->aspectRatio();
      });
      $thumbImage->stream();
      Storage::put($path, $thumbImage);
   }

   public function getFile()
   {
      if ($this->makeFileAttribute()->toArray()) {
         return $this->makeFileAttribute()->toArray()[0]['full_path'];
      }
      return "";
   }

   public function getFiles()
   {

      return $this->makeFileAttribute()->pluck('full_path');
   }


   public function getFileAttribute()
   {
      return $this->makeFileAttribute()->first();
   }


   public function getFilesAttribute()
   {
      return $this->makeFileAttribute();
   }

   public function getThumbAttribute()
   {
      return $this->makeFileAttribute()->first();
   }

   public function getThumbsAttribute()
   {
      return $this->makeFileAttribute();
   }

   public function getThumb()
   {
      if ($this->makeThumbsAttribute()->toArray()) {
         return $this->makeThumbsAttribute()->toArray()[0]['full_path'];
      }
      return "";
   }

   public function getThumbs()
   {
      return $this->makeThumbsAttribute()->pluck('full_path');
   }

   public function makeThumbsAttribute()
   {
      $data = $this->field;
      $file_id = $this->getModel()->$data;
      $file = File::where('file_id',  $file_id)->where('model_id', $this->getModel()->id)->orderBy('order', 'ASC')->get();
      $file->map(function ($item) {
         // check thumbnail availbale or not , 
         $exists = Storage::disk('public')->exists($item->path . $this->searchThumb($item->name_hash));

         if (!$exists) {
            // return default original 
            $item['full_path'] = url('storage/' . $item->path . $item->name_hash);
            return $item;
         }

         // return default thumbnail 
         $addString = "-thumb";
         $fileInfo = pathinfo($item->name_hash);
         $newFileName = $fileInfo['filename'] . $addString . '.' . $fileInfo['extension'];
         $item['full_path'] = url('storage/' . $item->path . $newFileName);
         return $item;
      });

      return $file;
   }

   public function makeFileAttribute()
   {
      $data = $this->field;
      $file_id = $this->getModel()->$data;
      $file = File::where('file_id',  $file_id)->where('model_id', $this->getModel()->id)->orderBy('order', 'ASC')->get();
      $file->map(function ($item) {
         $item['full_path'] = url('storage/' . $item->path . $item->name_hash);
         return $item;
      });

      return $file;
   }

   private function searchThumb($name_hash)
   {
      $addString = "-thumb";
      $fileInfo = pathinfo($name_hash);
      $thumbName = $fileInfo['filename'] . $addString . '.' . $fileInfo['extension'];
      return $thumbName;
   }
}