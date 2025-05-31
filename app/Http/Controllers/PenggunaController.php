<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Lapangan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

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
            'peran' => 'pengguna',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('pengguna')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('pengguna')->user();

            if ($user->peran === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('pengguna.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    public function logout()
    {
        Auth::guard('pengguna')->logout();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    public function adminDashboard()
    {
        $user = Auth::guard('pengguna')->user();

        if (!$user || $user->peran !== 'admin') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }

        return view('admin.dashboard');
    }

    public function penggunaDashboard()
    {
        $user = Auth::guard('pengguna')->user();

        if (!$user || $user->peran !== 'pengguna') {
            return redirect()->route('login')->with('error', 'Akses ditolak.');
        }

        $lapangan = Lapangan::all();
        $fasilitas = Fasilitas::all();

        return view('pengguna.dashboard', compact('user', 'lapangan', 'fasilitas'));
    }
}
