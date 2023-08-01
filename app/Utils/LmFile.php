<?php

namespace App\Utils;

use App\Models\File;
use App\Models\Pengawasan;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;

use Throwable;

class LmFile 
{

   protected $path;
   protected $uuid;
   protected $parent_id;
   protected $file;
   protected $save;
   protected $multiple = false;

   public function file($file)
   {
      $this->file =  $file;
      return $this;
   }

   public function multiple($multiple)
   {
      $this->multiple =  $multiple;
      return $this;
   }

   public function path(string $path)
   {
      $this->path =  $path;
      return $this;
   }
   public function uuid($uuid)
   {
      $this->uuid =  $uuid;
      return $this;
   }
   public function parent_id(string $parent_id)
   {
      $this->parent_id =  $parent_id;
      return $this;
   }



   public function save()
   {
      if($this->file){
         if ($this->multiple == true ) {
            foreach ($this->file as $key => $value) {
               $name_uniqe = null;
               $custom_path = null;
               $uuid = null;
               try {
                  if ($value) {
                     DB::beginTransaction();
                     $name_ori = $value->getClientOriginalName();
                     $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_ori, PATHINFO_FILENAME) . '-' . Str::uuid()->toString() . '-' . Str::random(50));
   
                     $custom_path = $this->getPath($this->path);
                     Log::info('Path file = ' . $custom_path);
   
                     $file = File::create([
                        'file_id'        => $this->uuid,
                        'parent_file_id' => $this->parent_id,
                        'name_origin'    => $name_ori,
                        'name_random'    => $name_uniqe . '.' . $value->getClientOriginalExtension(),
                        'path'           => $custom_path,
                        'created_by'      => auth()->user()->id,
                        'size'           => $value->getSize(),
                     ]);
   
   
                     Log::info($file);
                     $value->storeAs('public/' . $custom_path, $name_uniqe . '.' . $value->getClientOriginalExtension());
   
                     DB::commit();
                  }
               } catch (\Throwable $th) {
                  DB::rollBack();
                  throw $th;
               }
            }
         } else {
            $name_uniqe = null;
            $custom_path = null;
            $uuid = null;
            try {
               if ($this->file) {
                  DB::beginTransaction();
                  $name_ori = $this->file->getClientOriginalName();
                  $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_ori, PATHINFO_FILENAME) . '-' . Str::uuid()->toString() . '-' . Str::random(50));
   
                  $custom_path = $this->getPath($this->path);
                  Log::info('Path file = ' . $custom_path);
   
                  $file = File::create([
                     'file_id'        => $this->uuid,
                     'parent_file_id' => $this->parent_id,
                     'name_origin'    => $name_ori,
                     'name_random'    => $name_uniqe . '.' . $this->file->getClientOriginalExtension(),
                     'path'           => $custom_path,
                     'created_by'      => auth()->user()->id,
                     'size'           => $this->file->getSize(),
                  ]);
   
   
                  Log::info($file);
                  $this->file->storeAs('public/' . $custom_path, $name_uniqe . '.' . $this->file->getClientOriginalExtension());
   
                  DB::commit();
               }
               return $this;
            } catch (\Throwable $th) {
               DB::rollBack();
               throw $th;
            }
         }
      }
     
   }

   public function update($file_id)
   {


      if ($this->multiple == true) {
         $pengawasan2 = Pengawasan::with('file_pk_r')->where('id',$this->parent_id)->first();
      
         $foto = $this->file;
      
         $fotoNames = [];
         foreach ($foto as $fotos) {
            $fotoNames[] = $fotos->getClientOriginalName();
         }
   
         foreach ($pengawasan2->file_pk_r  as $value) {
            $cek2 = Str::of($value->name_random)->contains($fotoNames);
            if ($cek2 == false) {
               File::destroy($value->id);
            }
         }
     
         foreach ($foto as $key => $value) {
            $cek = Str::of($value->getClientOriginalName())->contains($pengawasan2->file_pk_r->pluck('name_random')->toArray());
           // dd($cek);
            //cek insert new  
            $custom_path = $this->getPath($this->path);
            $name_ori = $value->getClientOriginalName();
            $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_ori, PATHINFO_FILENAME) . '-' . Str::uuid()->toString().'-'.Str::random(50));
          
            if ($cek == false) {
               File::create([
                  'file_id'        => $file_id,
                  'parent_file_id' => $this->parent_id,
                  'name_origin'    => $name_ori,
                  'name_random'    => $name_uniqe . '.' . $value->getClientOriginalExtension(),
                  'path'           => $custom_path,
                  'size'           => $value->getSize(),
               ]);
            }
            $value->storeAs('public/'.$custom_path, $name_uniqe.'.'. $value->getClientOriginalExtension());
         } 
      }else{
         $name_uniqe = null;
         $custom_path = null;
         $uuid = null;
         try {
            $file = File::where('file_id', $file_id)->first();
            $old_file = $file != null ? $file->name_random : NULL;
            if ($this->file) {
               if ($old_file != $this->file->getClientOriginalName()) {
                  DB::beginTransaction();
                  $name_ori = $this->file->getClientOriginalName();
                  $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_ori, PATHINFO_FILENAME) . '-' . Str::uuid()->toString().'-'.Str::random(50));
        
                  
                 $custom_path = $this->getPath($this->path);
   
                  if ($old_file == NULL) {
                     File::create([
                        'file_id'        => $file_id,
                        'parent_file_id' => $this->parent_id,
                        'name_origin'    => $name_ori,
                        'name_random'    => $name_uniqe.'.'.$this->file->getClientOriginalExtension(),
                        'path'           => $custom_path,
                        'size'           => $this->file->getSize(),
                     ]);
                     Log::info('create');
                  } else {
                     File::where('file_id', $file_id)->update(
                        [
                           'name_origin'    => $name_ori,
                           'name_random'    => $name_uniqe.'.'.$this->file->getClientOriginalExtension(),
                           'path'           => $custom_path,
                           'size'           => $this->file->getSize(),
                        ]
                     );
                     Log::info('update');
                  }
                  $this->file->storeAs('public/'.$custom_path, $name_uniqe.'.'.$this->file->getClientOriginalExtension());
                  DB::commit();
               } else {
                  Log::info('Abaikan');
               }
            }else{
               if($this->uuid != NULL){
                  $file = File::where('file_id', $this->uuid)->delete();
               }
               
            }
            DB::commit();
         } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
         }
      }
     
   
     
   }

   public function update2($file_id)
   {


      if ($this->multiple == true) {
         $pengawasan2 = Pengawasan::with('file_tindak_lanjut_r')->where('id',$this->parent_id)->first();
      
         $foto = $this->file;
      
         $fotoNames = [];
         foreach ($foto as $fotos) {
            $fotoNames[] = $fotos->getClientOriginalName();
         }
   
         foreach ($pengawasan2->file_tindak_lanjut_r  as $value) {
            $cek2 = Str::of($value->name_random)->contains($fotoNames);
            if ($cek2 == false) {
               File::destroy($value->id);
            }
         }
     
         foreach ($foto as $key => $value) {
            $cek = Str::of($value->getClientOriginalName())->contains($pengawasan2->file_tindak_lanjut_r->pluck('name_random')->toArray());
           // dd($cek);
            //cek insert new  
            $custom_path = $this->getPath($this->path);
            $name_ori = $value->getClientOriginalName();
            $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_ori, PATHINFO_FILENAME) . '-' . Str::uuid()->toString().'-'.Str::random(50));
          
            if ($cek == false) {

               File::create([
                  'file_id'        => $file_id,
                  'parent_file_id' => $this->parent_id,
                  'name_origin'    => $name_ori,
                  'name_random'    => $name_uniqe . '.' . $value->getClientOriginalExtension(),
                  'path'           => $custom_path,
                  'size'           => $value->getSize(),
               ]);
            }
            $value->storeAs('public/'.$custom_path, $name_uniqe.'.'. $value->getClientOriginalExtension());
         } 
      }else{
         $name_uniqe = null;
         $custom_path = null;
         $uuid = null;
         try {
            $file = File::where('file_id', $file_id)->first();
            $old_file = $file != null ? $file->name_random : NULL;
            if ($this->file) {
               if ($old_file != $this->file->getClientOriginalName()) {
                  DB::beginTransaction();
                  $name_ori = $this->file->getClientOriginalName();
                  $name_uniqe =  RemoveSpace::removeDoubleSpace(pathinfo($name_ori, PATHINFO_FILENAME) . '-' . Str::uuid()->toString().'-'.Str::random(50));
        
                  
                 $custom_path = $this->getPath($this->path);
   
                  if ($old_file == NULL) {
                     File::create([
                        'file_id'        => $file_id,
                        'parent_file_id' => $this->parent_id,
                        'name_origin'    => $name_ori,
                        'name_random'    => $name_uniqe.'.'.$this->file->getClientOriginalExtension(),
                        'path'           => $custom_path,
                        'size'           => $this->file->getSize(),
                     ]);
                     Log::info('create');
                  } else {
                     File::where('file_id', $file_id)->update(
                        [
                           'name_origin'    => $name_ori,
                           'name_random'    => $name_uniqe.'.'.$this->file->getClientOriginalExtension(),
                           'path'           => $custom_path,
                           'size'           => $this->file->getSize(),
                        ]
                     );
                     Log::info('update');
                  }
                  $this->file->storeAs('public/'.$custom_path, $name_uniqe.'.'.$this->file->getClientOriginalExtension());
                  DB::commit();
               } else {
                  Log::info('Abaikan');
               }
            }else{
               if($this->uuid != NULL){
                  $file = File::where('file_id', $this->uuid)->delete();
               }
               
            }
            DB::commit();
         } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
         }
      }
     
   
     
   }

   public function getPath($folder)
   {
      $tahun       = Carbon::now()->format('Y');
      $bulan       = Carbon::now()->format('m');
      $custom_path = $tahun . '/' . $bulan . '/' . $folder;
      $path        = storage_path('app/public/' . $custom_path);
      if (!FacadesFile::isDirectory($path)) {
         FacadesFile::makeDirectory($path, 0777, true, true);
      }
      return $custom_path;
   }
}
