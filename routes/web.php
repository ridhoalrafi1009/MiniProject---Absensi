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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/code')->middleware(['role:admin,pj'])->group(function () {
    Route::get('/', [App\Http\Controllers\CodeController::class, 'index'])->name('indexCode');
    Route::post('/store', [App\Http\Controllers\CodeController::class, 'store'])->name('storeKode');
});

Route::prefix('/dataasisten')->middleware(['role:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\AsistenController::class, 'index'])->name('indexAsisten');
    Route::post('/post', [App\Http\Controllers\AsistenController::class, 'store'])->name('storeAsisten');
    Route::post('/edit', [App\Http\Controllers\AsistenController::class, 'edit'])->name('editAsisten');
    Route::post('/update', [App\Http\Controllers\AsistenController::class, 'update'])->name('updateAsisten');
    Route::get('/destroy/{id}', [App\Http\Controllers\AsistenController::class, 'destroy'])->name('destroyAsisten');
});

Route::prefix('/datamateri')->middleware(['role:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\MateriController::class, 'index'])->name('indexMateri');
    Route::post('/post', [App\Http\Controllers\MateriController::class, 'store'])->name('storeMateri');
    Route::post('/edit', [App\Http\Controllers\MateriController::class, 'edit'])->name('editMateri');
    Route::post('/update', [App\Http\Controllers\MateriController::class, 'update'])->name('updateMateri');
    Route::get('/destroy/{id}', [App\Http\Controllers\MateriController::class, 'destroy'])->name('destroyMateri');
});

Route::prefix('/datakelas')->middleware(['role:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\KelasController::class, 'index'])->name('indexKelas');
    Route::post('/post', [App\Http\Controllers\KelasController::class, 'store'])->name('storeKelas');
    Route::post('/edit', [App\Http\Controllers\KelasController::class, 'edit'])->name('editKelas');
    Route::post('/update', [App\Http\Controllers\KelasController::class, 'update'])->name('updateKelas');
    Route::get('/destroy/{id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('destroyKelas');
});

Route::post('/absensi/post', [App\Http\Controllers\AbsensiController::class, 'store'])->name('storeAbsen');
Route::post('/absensi/update', [App\Http\Controllers\AbsensiController::class, 'update'])->name('updateAbsen');

Route::get('/riwayat/index', [App\Http\Controllers\RiwayatController::class, 'index'])->name('indexRiwayat');
Route::get('/riwayat/report', [App\Http\Controllers\RiwayatController::class, 'report'])->name('reportRiwayat');
Route::post('/riwayat/cari', [App\Http\Controllers\RiwayatController::class, 'search'])->name('searchRiwayat');

Route::get('/user/profile/{id}', [App\Http\Controllers\AsistenController::class, 'editProfile'])->name('editProfile');


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
