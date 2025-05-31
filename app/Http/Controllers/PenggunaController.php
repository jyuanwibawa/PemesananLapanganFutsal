<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // Tampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengguna',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => 'pengguna', // default role saat register
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Login pakai guard 'pengguna'
        if (Auth::guard('pengguna')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('pengguna')->user();

            // Redirect berdasarkan role
            if ($user->peran === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('pengguna.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::guard('pengguna')->logout();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    // Halaman dashboard admin, cek manual role & login
    public function adminDashboard()
    {
        $user = Auth::guard('pengguna')->user();

        if (!$user || $user->peran !== 'admin') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }

        return view('admin.dashboard'); // pastikan view ini ada
    }

    // Halaman dashboard pengguna, cek manual role & login
    public function penggunaDashboard()
    {
        $user = Auth::guard('pengguna')->user();

        if (!$user || $user->peran !== 'pengguna') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }

        return view('pengguna.dashboard'); // pastikan view ini ada
    }
}
