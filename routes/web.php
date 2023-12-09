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

Route::get('/d', function () {
    return view('dashboard');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/kuesioner-isi/{id}', [App\Http\Controllers\UserController::class, 'kuesioner'])->name('user-kuesioner');
    Route::post('/kuesioner-isi', [App\Http\Controllers\UserController::class, 'kuesioner_isi'])->name('user-kuesioner-isi');
    Route::get('/kuesioner-list', [App\Http\Controllers\UserController::class, 'kuesioner_list'])->name('user-kuesioner-list');

    //admin
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita');
    Route::post('/berita-tambah', [App\Http\Controllers\BeritaController::class, 'tambah'])->name('berita-tambah');
    Route::post('/berita-update/{id}', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita-update');
    Route::delete('/berita-hapus{id}', [App\Http\Controllers\BeritaController::class, 'hapus'])->name('berita-hapus');

    Route::get('/kuesioner', [App\Http\Controllers\KuesionerController::class, 'index'])->name('kuesioner');
    Route::post('/kuesioner-tambah', [App\Http\Controllers\KuesionerController::class, 'tambah'])->name('kuesioner-tambah');
    Route::post('/kuesioner-update/{id}', [App\Http\Controllers\KuesionerController::class, 'update'])->name('kuesioner-update');
    Route::delete('/kuesioner-hapus/{id}', [App\Http\Controllers\KuesionerController::class, 'hapus'])->name('kuesioner-hapus');
    Route::get('/kuesioner-jawaban/{id}', [App\Http\Controllers\KuesionerController::class, 'jawaban'])->name('kuesioner-jawaban');

    Route::get('/pertanyaan/{id}', [App\Http\Controllers\PertanyaanController::class, 'index'])->name('pertanyaan');
    Route::post('/pertanyaan', [App\Http\Controllers\PertanyaanController::class, 'tambah'])->name('pertanyaan-tambah');
    Route::delete('/pertanyaan-hapus/{id}', [App\Http\Controllers\PertanyaanController::class, 'hapus'])->name('pertanyaan-hapus');

    Route::get('/alumni', [App\Http\Controllers\HomeController::class, 'alumni'])->name('alumni');
    Route::get('/kuisioner', [App\Http\Controllers\HomeController::class, 'kuisioner'])->name('kuisioner');

    Route::get('/alumni', [App\Http\Controllers\AlumniController::class, 'index'])->name('alumni');
    Route::post('/alumni-tambah', [App\Http\Controllers\AlumniController::class, 'tambah'])->name('alumni-tambah');
    Route::post('/alumni-update/{id}', [App\Http\Controllers\AlumniController::class, 'update'])->name('alumni-update');
    Route::delete('/alumni-hapus{id}', [App\Http\Controllers\AlumniController::class, 'hapus'])->name('alumni-hapus');
});
Route::get('/alumni-list', [App\Http\Controllers\UserController::class, 'alumni_list'])->name('user-alumni-list');


Route::get('/kuesioner-hasil', [App\Http\Controllers\UserController::class, 'kuesioner_hasil'])->name('user-kuesioner-hasil');
Route::get('/', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
Route::get('/tentang', [App\Http\Controllers\UserController::class, 'tentang'])->name('tentang');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user-profile');
