<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Spatie\ResponseCache\Facades\ResponseCache;

class SettingsController extends Controller
{
   protected $settingsArray;

   public function __construct()
   {
      // settings cache variable
      $this->settingsArray = [
         'sidebar_color', 'sidebar_bg_color', 'sidebar_header_bg',
         'content_wrapper_bg_color', 'sidebar_active_bg', 'footer_text',
         'footer_right', 'navbar_bg', 'nav_item_hover', 'app_name',
         'btn_primary', 'btn_secondary', 'btn_danger', 'btn_info', 'btn_success', 'btn_warning', 'progress_bar',
         'header_logo', 'fav_icon'
      ];
   }

   public function index()
   {
      try {
         $settingsArray = collect();
         foreach ($this->settingsArray as $key => $value) {
            $settingsArray->push([
               $value => Cache::store('styles')->get($value),
            ]);
         }

       
         return view('admin.styles.index', compact('settingsArray'));
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   public function update(Request $request)
   {


      $array = array_diff($this->settingsArray, ['header_logo', 'fav_icon']);

      try {
         foreach ($array as $key => $value) {
            Cache::store('styles')->forever($value, $request->$value);
         }

         if ($request->file('fav_icon')) {
            $file = $request->file('fav_icon');
            $img = Str::random(10) . "-" . $file->getClientOriginalName();
            Cache::store('styles')->forever('fav_icon',  $img);
            $file->move('img',  $img);
         }

         if ($request->file('header_logo')) {
            $file = $request->file('header_logo');
            $img = Str::random(10) . "-" . $file->getClientOriginalName();
            Cache::store('styles')->forever('header_logo',  $img);
            $file->move('img',  $img);
         }

         
         ResponseCache::forget(route('settings.index'));
         return redirect()->back()->with('success', __('trans.crud.success'), 200);
      } catch (\Throwable $th) {
         return redirect()->back()->with('error', __('trans.crud.error') . $th, 400);
      }
   }

   public function reset($cache_key)
   {

      try {
         Cache::forget($cache_key);
         return redirect()->back()->with('success', config('language.alert-success.store'), 200);
      } catch (\Throwable $th) {
         return redirect()->back()->with('error', config('language.alert-error.store'), 400);
      }
   }
}
