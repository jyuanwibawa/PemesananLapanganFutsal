<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lapangan;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::all();
        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable',
            'harga_per_jam' => 'required|numeric',
            'status_aktif' => 'required|boolean',
        ]);

        Lapangan::create($request->all());

        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $request->validate([
            'nama_lapangan' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable',
            'harga_per_jam' => 'required|numeric',
            'status_aktif' => 'required|boolean',
        ]);

        $lapangan->update($request->all());

        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Lapangan::destroy($id);
        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil dihapus.');
    }
}


// BookingController

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function riwayat()
    {
        $riwayat = Booking::with('pengguna', 'lapangan')->latest()->get();
        return view('admin.booking.riwayat', compact('riwayat'));
    }
}
