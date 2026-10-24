<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Beranda', function(){
    return view('Beranda');
})->name('beranda');

Route::get('/LaporanSaya', function(){
    return view('LaporanSaya');
})->name('laporan');