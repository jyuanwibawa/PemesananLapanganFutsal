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
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'status_verifikasi' => 'required|in:pending,diterima,ditolak',
        ]);

        $pembayaran->update($request->only('status_verifikasi'));

        return redirect()->route('admin.pembayaran.index')->with('success', 'Status pembayaran diperbarui.');
    }

    public function destroy($id)
    {
        Pembayaran::destroy($id);
        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran dihapus.');
    }
}
