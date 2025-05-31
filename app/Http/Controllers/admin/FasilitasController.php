<?php

// FasilitasController

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Lapangan;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::with('lapangan')->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        $lapangans = Lapangan::all();
        return view('admin.fasilitas.create', compact('lapangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lapangan' => 'required|exists:lapangan,id',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Fasilitas::create($request->all());

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $lapangans = Lapangan::all();
        return view('admin.fasilitas.edit', compact('fasilitas', 'lapangans'));
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'id_lapangan' => 'required|exists:lapangan,id',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $fasilitas->update($request->all());

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Fasilitas::destroy($id);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
