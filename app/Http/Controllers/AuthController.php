<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
       public function index()
    {
        return view('Login');
    }
    // Memproses login
    public function login(Request $request)
    {
        $Data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $Pengguna = Pengguna::where('email', $Data['email'])->first();

        if (
            !$Pengguna ||
            !Hash::check($Data['password'], $Pengguna->password)
        ) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'login' => 'Email atau password salah.',
                ]);
        }

        // Menyimpan identitas pengguna ke session
        $request->session()->regenerate();

        $request->session()->put([
            'id_pengguna' => $Pengguna->id,
            'nama_pengguna' => $Pengguna->nama,
            'role' => $Pengguna->role,
        ]);

      if ($Pengguna->role === 'admin') {
    return redirect()->route('admin.dashboard');
}

return redirect()->route('beranda');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}