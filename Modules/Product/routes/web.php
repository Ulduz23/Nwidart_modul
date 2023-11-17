<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\app\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('products', ProductController::class)->names('product');
});
Route::get('/product/gallery', [ProductController::class, 'gallerylist'])->name('gallerylist');
Route::post('/product/galleryadd', [ProductController::class, 'galleryadd'])->name('galleryadd');
Route::get('/product/galleredit/{gallery}', [ProductController::class, 'galleryedit'])->name('galleryedit');
Route::post('/product/galleryupdate', [ProductController::class, 'galleryupdate'])->name('galleryupdate');
Route::post('/product/gallerydelete', [ProductController::class, 'gallerydelete'])->name('gallerydelete');
