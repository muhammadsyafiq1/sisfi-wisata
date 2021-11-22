<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::post('add/gallery/wisata', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');
    Route::get('delete/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('gallery.delete');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/tour/aktif/{id}', [App\Http\Controllers\TourController::class, 'aktif'])->name('tour.aktif');
    Route::get('/tour/tutup/{id}', [App\Http\Controllers\TourController::class, 'tutup'])->name('wisata.tutup');
    Route::get('/tour/buka/{id}', [App\Http\Controllers\TourController::class, 'buka'])->name('wisata.buka');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Auth::routes();

