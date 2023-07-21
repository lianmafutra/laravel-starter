<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {

   Route::controller(UserController::class)->group(function () {
      Route::put('user/profile/{user_id}', 'update')->name('user.update');
      Route::get('user/profile/{user_id}', 'show')->name('user.show');
      Route::put('user/profile/photo/change', 'changePhoto')->name('user.change.photo');
   });
 
});
