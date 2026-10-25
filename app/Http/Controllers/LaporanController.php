<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->get();

        return view('LaporanSaya', compact('laporan'));
    }
}