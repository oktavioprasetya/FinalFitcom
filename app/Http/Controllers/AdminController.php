<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard admin
    public function index(Request $request)
    {
        if (session('role') !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }

        $TotalLaporan = Laporan::count();

        $JumlahBaru = Laporan::where('status', 'Diterima')->count();

        $JumlahDiproses = Laporan::where('status', 'Diproses')->count();

        $JumlahSelesai = Laporan::where('status', 'Selesai')->count();

        $laporan = Laporan::latest()->get();

        $LaporanDipilih = $request->filled('laporan')
            ? Laporan::find($request->query('laporan'))
            : $laporan->first();

        return view('DashboardAdmin', compact(
            'TotalLaporan',
            'JumlahBaru',
            'JumlahDiproses',
            'JumlahSelesai',
            'laporan',
            'LaporanDipilih'
        ));
    }

    // Form ubah status
    public function editStatus($id)
    {
        if (session('role') !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }

        $Laporan = Laporan::findOrFail($id);

        return view('UbahStatusLaporan', compact('Laporan'));
    }

    public function updateStatus(Request $request, $id)
{
    if (session('role') !== 'admin') {
        abort(403, 'Akses hanya untuk admin.');
    }

    $Data = $request->validate([
        'status' => 'required|in:Diterima,Diproses,Selesai,Ditolak',
        'catatan_admin' => 'nullable|string|max:5000',
    ]);

    $Laporan = Laporan::findOrFail($id);

    $Laporan->update([
        'status' => $Data['status'],
        'catatan_admin' => $Data['catatan_admin'] ?? null,
    ]);

    return redirect()
        ->route('admin.status.edit', $Laporan->id)
        ->with('success', 'Status laporan berhasil diperbarui.');
}

    // Profil admin
    public function profil()
    {
        if (session('role') !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }

        $Pengguna = Pengguna::findOrFail(session('id_pengguna'));

        return view('ProfilAdmin', compact('Pengguna'));
    }
}