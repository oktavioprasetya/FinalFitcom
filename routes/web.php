<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;

// HALAMAN UMUM

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Beranda', [LaporanController::class, 'beranda'])
    ->name('beranda');

// LOGIN DAN LOGOUT

Route::get('/Login', [AuthController::class, 'index'])
    ->name('login');

Route::post('/Login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/Logout', [AuthController::class, 'logout'])
    ->name('logout');

// REGISTRASI DAN PROFIL PENGGUNA

Route::get('/Registrasi', [PenggunaController::class, 'create'])
    ->name('registrasi');

Route::post('/Registrasi', [PenggunaController::class, 'store'])
    ->name('registrasi.store');

Route::get('/Profil', [PenggunaController::class, 'index'])
    ->name('profil');


Route::get('/LaporanSaya', [LaporanController::class, 'index'])
    ->name('laporan');

Route::get('/BuatLaporan', [LaporanController::class, 'create'])
    ->name('laporan.create');

Route::post('/BuatLaporan', [LaporanController::class, 'store'])
    ->name('laporan.store');

Route::get('/DetailLaporan/{id}', [LaporanController::class, 'detail'])
    ->name('laporan.detail');

Route::get('/DaftarLaporan', [LaporanController::class, 'daftar'])
    ->name('daftar.laporan');


Route::get('/Admin/Dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/Admin/Laporan/{id}/Status', [AdminController::class, 'editStatus'])
    ->name('admin.status.edit');

Route::patch('/Admin/Laporan/{id}/Status', [AdminController::class, 'updateStatus'])
    ->name('admin.status.update');

Route::get('/Admin/Profil', [AdminController::class, 'profil'])
    ->name('admin.profil');

Route::get('/DetailAdmin', function () {
    return view('DetailLaporanAdmin');
})->name('DetailAdmin');