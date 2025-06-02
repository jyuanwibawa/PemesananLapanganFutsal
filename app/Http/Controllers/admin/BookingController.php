<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Lapangan;

class BookingController extends Controller
{
    public function riwayat()
    {
        // Ambil data booking dengan relasi pengguna dan lapangan, urutkan terbaru
        $bookings = Booking::with('pengguna', 'lapangan')->latest()->get();

        // Kirim data ke view dengan variabel $bookings
        return view('admin.booking.riwayat', compact('bookings'));
    }

    public function edit($id)
    {
        // Ambil data booking berdasarkan ID
        $booking = Booking::with('pengguna', 'lapangan')->findOrFail($id);

        // Ambil semua lapangan untuk dropdown
        $lapangans = Lapangan::all(); // Assuming you have a Lapangan model

        // Kirim data booking dan lapangan ke view edit
        return view('admin.booking.edit', compact('booking', 'lapangans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'id_lapangan' => 'required|exists:lapangan,id',
            'tanggal_booking' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Ambil data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Update data booking
        $booking->update([
            'id_lapangan' => $request->id_lapangan,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            // Tambahkan field lain sesuai kebutuhan
        ]);

        // Redirect ke halaman riwayat dengan pesan sukses
        return redirect()->route('admin.booking.history')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Hapus data booking
        $booking->delete();

        // Redirect ke halaman riwayat dengan pesan sukses
        return redirect()->route('admin.booking.history')->with('success', 'Booking berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate only the status field
        $request->validate([
            'status' => 'required|in:confirmed,pending,canceled', // Adjust as per your enum
        ]);

        // Retrieve the booking using the ID
        $booking = Booking::findOrFail($id);

        // Update the status
        $booking->update(['status' => $request->status]);

        return response()->json(['success' => 'Booking status updated successfully!']);
    }
}
