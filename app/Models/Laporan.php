<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'pengguna_id',
        'no_laporan',
        'lokasi',
        'kategori',
        'deskripsi',
        'foto',
        'tanggal',
        'status',
    ];
}