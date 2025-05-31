<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function riwayat()
    {
        // Ambil data booking dengan relasi pengguna dan lapangan, urutkan terbaru
        $bookings = Booking::with('pengguna', 'lapangan')->latest()->get();

        // Kirim data ke view dengan variabel $bookings
        return view('admin.booking.riwayat', compact('bookings'));
    }
}
