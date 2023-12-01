<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita');
Route::post('/berita-tambah', [App\Http\Controllers\BeritaController::class, 'berita_tambah'])->name('berita-tambah');
Route::post('/berita-update/{id}', [App\Http\Controllers\BeritaController::class, 'berita_update'])->name('berita-update');
Route::delete('/berita-hapus{id}', [App\Http\Controllers\BeritaController::class, 'berita_hapus'])->name('berita-hapus');

Route::get('/kuesioner', [App\Http\Controllers\KuesionerController::class, 'index'])->name('kuesioner');
Route::post('/kuesioner-tambah', [App\Http\Controllers\KuesionerController::class, 'kuesioner_tambah'])->name('kuesioner-tambah');
Route::post('/kuesioner-update/{id}', [App\Http\Controllers\KuesionerController::class, 'kuesionerupdate'])->name('kuesioner-update');
Route::delete('/kuesioner-hapus{id}', [App\Http\Controllers\KuesionerController::class, 'kuesioner_hapus'])->name('kuesioner-hapus');


Route::get('/alumni', [App\Http\Controllers\HomeController::class, 'alumni'])->name('alumni');
Route::get('/kuisioner', [App\Http\Controllers\HomeController::class, 'kuisioner'])->name('kuisioner');


