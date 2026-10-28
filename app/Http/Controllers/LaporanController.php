<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    // Menampilkan laporan milik pengguna yang login
    public function index()
    {
        $IdPengguna = session('id_pengguna');

        if (!$IdPengguna) {
            return redirect()->route('login')
                ->withErrors([
                    'login' => 'Silakan login terlebih dahulu.'
                ]);
        }

        $laporan = Laporan::where('pengguna_id', $IdPengguna)
            ->latest()
            ->get();

        $TotalLaporan = $laporan->count();
        $JumlahDiterima = $laporan->where('status', 'Diterima')->count();
        $JumlahDiproses = $laporan->where('status', 'Diproses')->count();
        $JumlahSelesai = $laporan->where('status', 'Selesai')->count();
        $JumlahDitolak = $laporan->where('status', 'Ditolak')->count();

        return view('LaporanSaya', compact(
            'laporan',
            'TotalLaporan',
            'JumlahDiterima',
            'JumlahDiproses',
            'JumlahSelesai',
            'JumlahDitolak'
        ));
    }

    // Menampilkan formulir laporan
    public function create()
    {
        return view('BuatLaporan');
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        $IdPengguna = session('id_pengguna');

        if (!$IdPengguna) {
            return redirect()->route('login')
                ->withErrors([
                    'login' => 'Silakan login terlebih dahulu.'
                ]);
        }

        $Data = $request->validate([
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp|max:2048',
        ]);

        // Membuat nomor laporan otomatis dan unik
        do {
            $NoLaporan = 'LAP-' . now()->format('Ymd') . '-'
                . strtoupper(Str::random(6));
        } while (
            Laporan::where('no_laporan', $NoLaporan)->exists()
        );

        // Menyimpan foto jika ada
        $Foto = null;

        if ($request->hasFile('foto')) {
            $Foto = $request->file('foto')
                ->store('foto-laporan', 'public');
        }

        // Menyimpan data laporan ke database
        Laporan::create([
            'pengguna_id' => $IdPengguna,
            'no_laporan' => $NoLaporan,
            'lokasi' => $Data['lokasi'],
            'kategori' => $Data['kategori'],
            'deskripsi' => $Data['deskripsi'],
            'foto' => $Foto,
            'tanggal' => now(),
            'status' => 'Diterima',
        ]);

        return redirect()->route('laporan')
            ->with('sukses', 'Laporan berhasil dikirim.');
    }

    // Menampilkan daftar seluruh laporan
    public function daftar()
    {
        $laporan = Laporan::latest()->get();

        $TotalLaporan = $laporan->count();
        $JumlahDiproses = $laporan->where('status', 'Diproses')->count();
        $JumlahDiterima = $laporan->where('status', 'Diterima')->count();

        return view('DaftarLaporan', compact(
            'laporan',
            'TotalLaporan',
            'JumlahDiproses',
            'JumlahDiterima'
        ));
    }

    // Menampilkan detail laporan
    public function detail(int $id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('DetailLaporan', compact('laporan'));
    }
}