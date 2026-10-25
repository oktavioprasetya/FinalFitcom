<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class BerandaController extends Controller
{
    public function index(): View
    {
        $stats = [
            ['key' => 'total',    'label' => 'Total Laporan',   'value' => 15],
            ['key' => 'diterima', 'label' => 'Diterima',        'value' => 5],
            ['key' => 'diproses', 'label' => 'Sedang Diproses', 'value' => 3],
            ['key' => 'selesai',  'label' => 'Selesai',         'value' => 7],
        ];

        $alur = [
            [
                'title' => 'Isi Laporan',
                'desc'  => 'Pilih kategori, tuliskan lokasi dan ceritakan kejadiannya secara singkat.',
                'tone'  => 'primary',
            ],
            [
                'title' => 'Diverifikasi',
                'desc'  => 'Perangkat desa memeriksa kebenaran dan kelengkapan laporan sebelum ditindaklanjuti.',
                'tone'  => 'soft',
            ],
            [
                'title' => 'Diproses',
                'desc'  => 'Laporan mulai ditindaklanjuti oleh pihak desa sesuai dengan permasalahan yang dilaporkan.',
                'tone'  => 'soft',
            ],
            [
                'title' => 'Selesai & terkonfirmasi',
                'desc'  => 'Status diperbarui menjadi selesai dan pelapor bisa melihat hasilnya kapan saja.',
                'tone'  => 'primary',
            ],
        ];

        $kategori = collect([
            'jalan-jembatan'    => 'Jalan & jembatan',
            'lingkungan'        => 'Lingkungan',
            'drainase-saluran'  => 'Drainase & Saluran Air',
            'fasilitas-umum'    => 'Fasilitas Umum',
            'penerangan-jalan'  => 'Penerangan Jalan',
            'lainnya'           => 'Lainnya',
        ])->map(fn (string $label, string $slug) => [
            'slug'  => $slug,
            'label' => $label,
            'url'   => $this->url('laporan.create', ['kategori' => $slug]),
        ])->values()->all();

        return view('beranda', [
            'heroImage'  => asset('images/kantor-desa.svg'), // ganti ke foto asli (jpg/webp)
            'buatUrl'    => $this->url('laporan.create'),
            'statusUrl'  => $this->url('laporan.status'),
            'stats'      => $stats,
            'alur'       => $alur,
            'kategori'   => $kategori,
        ]);
    }
    private function url(string $name, array $params = []): string
    {
        return Route::has($name) ? route($name, $params) : '#';
    }
}