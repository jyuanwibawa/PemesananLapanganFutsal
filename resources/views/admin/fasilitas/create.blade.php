<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Fasilitas</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-fasilitas.css') }}" />
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">

            <!-- Header -->
            @include('layouts.header')

            <!-- Main Content Area -->
            <div class="container">
                <h2>Tambah Fasilitas</h2>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
                @endif

                <form action="{{ route('admin.fasilitas.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="id_lapangan">Pilih Lapangan</label>
                        <select name="id_lapangan" id="id_lapangan" class="form-control" required>
                            <option value="">-- Pilih Lapangan --</option>
                            @foreach($lapangans as $lapangan)
                            <option value="{{ $lapangan->id }}">{{ $lapangan->nama_lapangan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                        <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>

        </div>

    </div>
</body>

</html>