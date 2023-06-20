<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('produk/{category}', [Controllers\HomeController::class, 'agenda_kegiatan'])->name('home.agenda_kegiatan');
Route::get('kategori/{category}', [Controllers\HomeController::class, 'kategori'])->name('home.kategori');
Route::get('search', [Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('home', [Controllers\HomeController::class, 'redir_admin'])->name('home.redir_admin');

Route::group(['middleware' => 'revalidate'], function () {
    Auth::routes(['register' => false, 'reset' => false]);
    Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    // route agenda_kegiatan
    Route::prefix('admin/agenda_kegiatan')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'agenda_kegiatan'])->name('admin.agenda_kegiatan');
        Route::get('delete/{category}', [App\Http\Controllers\AdminController::class, 'delete_agenda_kegiatan'])->name('admin.delete_agenda_kegiatan');
        Route::post('edit', [App\Http\Controllers\AdminController::class, 'edit_agenda_kegiatan'])->name('admin.edit_agenda_kegiatan');
        Route::post('create', [App\Http\Controllers\AdminController::class, 'create_agenda_kegiatan'])->name('admin.create_agenda_kegiatan');
        Route::post('update', [App\Http\Controllers\AdminController::class, 'update_agenda_kegiatan'])->name('admin.update_agenda_kegiatan');
    });
    Route::resource('admin/agenda',App\Http\Controllers\AgendaKegiatanController::class);

    // route kategori
    Route::prefix('admin/kategori')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'kategori'])->name('admin.kategori');
        Route::get('delete/{category}', [App\Http\Controllers\AdminController::class, 'delete_kategori'])->name('admin.delete_kategori');
        Route::post('create', [App\Http\Controllers\AdminController::class, 'create_kategori'])->name('admin.create_kategori');
        Route::post('update', [App\Http\Controllers\AdminController::class, 'update_kategori'])->name('admin.update_kategori');
    });


    // route profil
    Route::prefix('admin/profil')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'profil'])->name('admin.profil');
        Route::post('update', [App\Http\Controllers\AdminController::class, 'update_profil'])->name('admin.update_profil');
    });
});
