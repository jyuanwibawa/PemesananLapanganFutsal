<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Lapangan</title>

    <!-- Tautkan CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-lapangan-form.css') }}" />
</head>

<body>
    <div class="wrapper">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <div class="main-content">

            {{-- Header --}}
            @include('layouts.header')

            {{-- Konten utama --}}
            <section class="content-section">
                <h2>Edit Lapangan</h2>

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

                <form action="{{ route('admin.lapangan.update', $lapangan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama_lapangan">Nama Lapangan</label>
                        <input type="text" name="nama_lapangan" id="nama_lapangan"
                            value="{{ old('nama_lapangan', $lapangan->nama_lapangan) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi"
                            rows="4">{{ old('deskripsi', $lapangan->deskripsi) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Lapangan</label><br>
                        @if ($lapangan->gambar)
                        <img src="{{ asset('storage/' . $lapangan->gambar) }}" alt="Gambar Lapangan" width="200"><br>
                        @endif
                        <input type="file" name="gambar" id="gambar" accept="image/*">
                        <small>(Kosongkan jika tidak ingin mengubah gambar)</small>
                    </div>

                    <div class="form-group">
                        <label for="harga_per_jam">Harga / Jam (Rp)</label>
                        <input type="number" name="harga_per_jam" id="harga_per_jam"
                            value="{{ old('harga_per_jam', $lapangan->harga_per_jam) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status_aktif">Status</label>
                        <select name="status_aktif" id="status_aktif" required>
                            <option value="1" {{ old('status_aktif', $lapangan->status_aktif) == 1 ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="0" {{ old('status_aktif', $lapangan->status_aktif) == 0 ? 'selected' : '' }}>
                                Nonaktif
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">Perbarui</button>
                    <a href="{{ route('admin.lapangan.index') }}" class="btn-cancel">Batal</a>
                </form>
            </section>

        </div>

    </div>
</body>

</html>