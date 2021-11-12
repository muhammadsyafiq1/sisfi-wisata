<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/gallery/{id}/create', [App\Http\Controllers\GalleryController::class, 'createGallery'])->name('gallery.create');
    Route::resource('wisata', App\Http\Controllers\TourController::class);
    Route::resource('kategori', App\Http\Controllers\CategoryController::class);
    Route::post('add/gallery/wisata', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');
    Route::get('delete/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('gallery.delete');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

