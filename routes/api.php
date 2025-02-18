<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Lowongan;
use App\Http\Controllers\LowonganAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Alumni;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\PrestasiController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lowongan/all', [Lowongan::class, 'getListProduk']);
Route::get('/lowongan/kode/{kode}', [Lowongan::class, 'getByKode']);
Route::post('/lowongan/input', [Lowongan::class, 'store']);
Route::put('/lowongan/input/{id_lowongan}', [Lowongan::class, 'update'])->name('lowongan.update');
Route::delete('lowongan/hapus', [Lowongan::class, 'destroy']);

Route::get('/alumni/all', [AlumniController::class, 'getList']);
Route::get('/alumni/kode/{kode}', [AlumniController::class, 'getByKode']);
Route::get('/adminuser/all', [DataUser::class, 'getList']);
Route::get('/adminuser/kode/{kode}', [DataUser::class, 'getByKode']);
Route::get('/adminuser/dataTable', [DataUser::class, 'dataDatables']);
Route::get('/prestasi/kode/{kode}', [PrestasiController::class, 'getByKode']);
Route::post('/alumni/input', [AlumniController::class, 'store']);
// Route::delete('alumni/hapus', [AlumniController::class, 'destroy']);
Route::get('/alumni/dataTable', [AlumniController::class, 'dataDatables']);
Route::post('/password/reset-code', [AuthController::class, 'sendResetCode'])->name('password.reset-code');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::get('/provinsi', [AlumniController::class, 'get_prov']);
Route::get('/kota/{kode}', [AlumniController::class, 'get_kota']);
Route::get('/kecamatan/{kode}', [AlumniController::class, 'get_kec']);
Route::get('/kelurahan/{kode}', [AlumniController::class, 'get_kel']);

Route::get('/provinsi', [Lowongan::class, 'get_prov']);
Route::get('/kotaa/{kode}', [Lowongan::class, 'get_kota']);
Route::get('/kecamatann/{kode}', [Lowongan::class, 'get_kec']);
Route::get('/kelurahann/{kode}', [Lowongan::class, 'get_kel']);
