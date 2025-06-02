<?php

// PembayaranController

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Booking;

class PembayaranController extends Controller
{
    public function index()
    {
        // Ambil semua pembayaran beserta relasi pengguna, booking, lapangan supaya eager load
        $pembayarans = Pembayaran::with('pengguna', 'booking.lapangan')->get();

        // Kirim ke view
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function edit($id)
    {
        // Cek apakah pembayaran ada
        $pembayaran = Pembayaran::findOrFail($id);

        // Mengambil data pemesan dan lapangan untuk ditampilkan pada form edit
        $booking = $pembayaran->booking; // Ambil data booking terkait
        $lapangan = $booking ? $booking->lapangan : null; // Ambil lapangan dari booking

        return view('admin.pembayaran.edit', compact('pembayaran', 'booking', 'lapangan'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Validasi input dari permintaan
        $request->validate([
            'status_verifikasi' => 'required|in:pending,diterima,ditolak',
        ]);

        // Memperbarui status pembayaran
        $pembayaran->update($request->only('status_verifikasi'));

        return redirect()->route('admin.pembayaran.index')->with('success', 'Status pembayaran diperbarui.');
    }

    public function destroy($id)
    {
        // Mencoba menemukan pembayaran berdasarkan ID
        $pembayaran = Pembayaran::find($id);

        if ($pembayaran) {
            $pembayaran->delete(); // Menghapus pembayaran
            return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran dihapus.');
        } else {
            return redirect()->route('admin.pembayaran.index')->with('error', 'Data pembayaran tidak ditemukan.');
        }
    }
}
