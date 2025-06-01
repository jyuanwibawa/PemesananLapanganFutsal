<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Lapangan;
use App\Models\Booking;
use App\Models\Pembayaran;
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

            // Log successful login
            \Log::info('User logged in successfully:', ['user_id' => $user->id]);

            return $user->peran === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('pengguna.dashboard');
        }

        \Log::warning('Login attempt failed:', ['email' => $request->email]);
        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    public function logout()
    {
        $userId = Auth::guard('pengguna')->user()->id;
        Auth::guard('pengguna')->logout();

        // Log user logout
        \Log::info('User logged out:', ['user_id' => $userId]);

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

        $lapangan = Lapangan::with('fasilitas')->get();
        return view('pengguna.dashboard', compact('user', 'lapangan'));
    }
    public function createPembayaran(Request $request)
    {
        // Validasi data pembayaran
        $request->validate([
            'id_booking' => 'required|exists:booking,id',
            'metode_bayar' => 'required|string|max:50',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Hanya menerima file gambar
        ]);

        // Proses upload bukti bayar
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filePath = $file->store('bukti_bayar', 'public'); // Menyimpan di storage/app/public/bukti_bayar

            // Log pembuatan pembayaran
            $pembayaranData = [
                'id_booking' => $request->id_booking,
                'id_pengguna' => Auth::guard('pengguna')->user()->id,
                'metode_bayar' => $request->metode_bayar,
                'bukti_bayar' => $filePath, // Simpan path file yang diupload
                'status_verifikasi' => 'pending', // Menggunakan string enum
            ];

            \Log::info('Creating a new pembayaran:', $pembayaranData);

            // Membuat entri pembayaran
            Pembayaran::create($pembayaranData);

            \Log::info('Pembayaran created successfully:', ['pembayaran' => $pembayaranData]);

            return redirect()->route('pengguna.dashboard')->with('success', 'Pembayaran berhasil diajukan, menunggu verifikasi admin.');
        }

        return back()->withErrors(['bukti_bayar' => 'Gagal mengunggah bukti pembayaran.'])->withInput();
    }
    public function createBooking(Request $request)
    {
        $request->validate([
            'id_lapangan' => 'required|exists:lapangan,id',
            'tanggal_booking' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Log booking attempt
        $bookingData = [
            'id_pengguna' => Auth::guard('pengguna')->user()->id,
            'id_lapangan' => $request->id_lapangan,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'pending' // Default status
        ];

        \Log::info('Creating a new booking:', $bookingData);

        // Create booking entry
        Booking::create($bookingData);

        \Log::info('Booking created successfully:', ['booking' => $bookingData]);

        return redirect()->route('pengguna.dashboard')->with('success', 'Pemesanan berhasil, menunggu tinjauan admin.');
    }

    public function showBookingHistory()
    {
        $user = Auth::guard('pengguna')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melihat riwayat pemesanan.');
        }

        // Fetch booking data
        $bookings = Booking::where('id_pengguna', $user->id)
            ->with('lapangan')
            ->get();

        \Log::info('Retrieved booking history for user:', ['user_id' => $user->id, 'bookings_count' => $bookings->count()]);

        return view('pengguna.booking-history', compact('user', 'bookings'));
    }
}
