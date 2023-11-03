<?php

use App\Http\Controllers\SampleCrudController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
 
   Route::get('categories', [CategoryController::class, 'index']);
   Route::controller(UserController::class)->group(function () {
      Route::put('user/profile/{user_id}', 'update')->name('user.update');
      Route::get('user/profile/{user_id}', 'show')->name('user.show');
      Route::put('user/profile/photo/change', 'changePhoto')->name('user.change.photo');
   });

   Route::resource('sample-crud', SampleCrudController::class);
});
