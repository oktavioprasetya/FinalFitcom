<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // Menampilkan halaman registrasi
    public function create()
    {
        return view('Registrasi');
    }

    // Menyimpan akun baru
    public function store(Request $request)
    {
        $Data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:penggunas,email',
            'no_telepon' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Pengguna::create([
            'nama' => $Data['nama'],
            'email' => $Data['email'],
            'no_telepon' => $Data['no_telepon'],
            'password' => Hash::make($Data['password']),
            'role' => 'pengguna',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // Menampilkan profil pengguna
    public function index()
    {
        $IdPengguna = session('id_pengguna');

        if (!$IdPengguna) {
            return redirect()->route('login');
        }

        $Pengguna = Pengguna::findOrFail($IdPengguna);

        return view('Profil', compact('Pengguna'));
    }
}