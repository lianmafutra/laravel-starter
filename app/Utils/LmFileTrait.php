<?php

namespace App\Utils;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

trait LmFileTrait
{

   protected $path;
   protected $file;
   protected $field;
   protected $multiple = false;
   protected $getFile;

   public function file($file)
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


   public function multiple()
   {
      $this->multiple = true;
      return  $this;
   }



   public function getPath($folder)
   {
      $tahun       = Carbon::now()->format('Y');
      $bulan       = Carbon::now()->format('m');
      $custom_path = $tahun . '/' . $bulan . '/' . $folder . '/';
      $path        = storage_path('app/public/' . $custom_path);
      if (!FacadesFile::isDirectory($path)) {
         FacadesFile::makeDirectory($path, 0777, true, true);
      }
      return $custom_path;
   }

   public function upload()
   {
      if ($this->multiple) {
         foreach ($this->file as $key => $value) {
            $this->uploadFileProcess($value, $key + 1);
         }
      } else {
         $this->uploadFileProcess($this->file, 1);
      }
   }

   public function uploadFileProcess($file, $order)
   {
      $file_uuid = Str::uuid();
      $model = $this->getModel();
      $model->update([
         $this->field => $file_uuid
      ]);
      $name_origin = $file->getClientOriginalName();
      $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_origin, PATHINFO_FILENAME) . '-' . Str::uuid()->toString() . '-' . Str::random(50));
      $custom_path = $this->getPath($this->path);

      $file = File::create([
         'file_id'     => $file_uuid,
         'model_id'    => $model->id,
         'name_origin' => $name_origin,
         'name_hash'   => $name_uniqe . '.' . strtolower($file->getClientOriginalExtension()),
         'path'        => $custom_path,
         'created_by'  => auth()->user()->id,
         'mime'        => $file->getMimeType(),
         'order'       => $order,
         'size'        => $file->getSize(),
      ]);
      return $this;
   }

   public function getFile()
   {
      $data = $this->field;
      $file_id = $this->getModel()->$data;
    
      $file = File::where('file_id',  $file_id)->where('model_id', $this->getModel()->id)->orderBy('order', 'ASC')->get();
      $file->map(function ($item)  {
         $item['full_path'] = url('storage/'.$item->path.$item->name_hash);
         return $item;
      });
      return $file->toArray();
   }

   
}
