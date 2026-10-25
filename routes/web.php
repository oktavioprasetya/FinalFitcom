<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Beranda', function(){
    return view('Beranda');
})->name('beranda');

Route::get('/LaporanSaya', [LaporanController::class, 'index'])
    ->name('laporan');


Route::get('/BuatLaporan', function () {
    return view('BuatLaporan');
})->name('BuatLaporan');

Route::post('/laporan', [LaporanController::class, 'simpan'])
    ->name('laporan.simpan');