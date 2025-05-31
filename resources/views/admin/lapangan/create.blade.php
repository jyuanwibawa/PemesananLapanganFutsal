<section class="content-section">
    <h2>Tambah Lapangan</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.lapangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama_lapangan">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" id="nama_lapangan" value="{{ old('nama_lapangan') }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Lapangan</label>
            <input type="file" name="gambar" id="gambar" accept="image/*">
        </div>

        <div class="form-group">
            <label for="harga_per_jam">Harga / Jam (Rp)</label>
            <input type="number" name="harga_per_jam" id="harga_per_jam" value="{{ old('harga_per_jam') }}" required>
        </div>

        <div class="form-group">
            <label for="status_aktif">Status</label>
            <select name="status_aktif" id="status_aktif" required>
                <option value="1" {{ old('status_aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status_aktif') == '0' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Simpan</button>
        <a href="{{ route('admin.lapangan.index') }}" class="btn-cancel">Batal</a>
    </form>
</section>