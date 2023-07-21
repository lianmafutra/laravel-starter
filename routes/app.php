<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')->middleware(['auth'])->group(function () {
   Route::post('user/password/reset', [MasterPegawaiController::class, 'resetPassword'])->name('user.password.reset');
   Route::post('user/nonaktifkan', [MasterPegawaiController::class, 'nonaktifkan'])->name('user.nonaktifkan');
});

Route::middleware(['auth'])->group(function () {
   Route::put('user/profile/{user_id}', [UserController::class, 'update'])->name('user.update');
   Route::get('user/profile/{user_id}', [UserController::class, 'show'])->name('user.show');
   Route::put('user/profile/photo/change', [UserController::class, 'changePhoto'])->name('user.change.photo');
});
