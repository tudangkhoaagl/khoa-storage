<?php

use Illuminate\Support\Facades\Route;
use Khoa\KhoaStorage\Http\Controllers\GetStorageImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('storage_package/get-image', GetStorageImageController::class)->name('storage_package.get_image');
