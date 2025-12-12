<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\FrontController;

Route::get('/',[FrontController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    // Route::get('/categories', [SettingController::class, 'index'])->name('admin.categories');
    Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting');

    Route::resource('category', CategoryController::class);
    Route::resource('posts', PostController::class);
});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/setting', [SettingController::class, 'index'])->name('setting');

require __DIR__.'/auth.php';
