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