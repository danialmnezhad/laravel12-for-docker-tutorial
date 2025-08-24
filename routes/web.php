<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('upload', [ImageController::class, 'upload_image'])->name('upload')->middleware('auth');
Route::get('my-images', [ImageController::class, 'show_my_images'])->name('my-images')
 ->middleware('auth');
Route::get('', [ImageController::class, 'show_images'])->name('home');
Route::put('images/{image}', [ImageController::class, 'update_image'])->name('image-update');