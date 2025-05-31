<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Pengelolaan Lapangan</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-lapangan.css') }}" />
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">

            <!-- Header -->
            @include('layouts.header')

            <!-- Konten utama -->
            <section class="content-section">
                <h2>Pengelolaan Lapangan</h2>
                <a href="{{ route('admin.lapangan.create') }}" class="btn-create">Tambah Lapangan</a>

                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga / Jam</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lapangans as $lapangan)
                        <tr>
                            <td data-label="Nama">{{ $lapangan->nama_lapangan }}</td>
                            <td data-label="Deskripsi">{{ $lapangan->deskripsi }}</td>
                            <td data-label="Harga / Jam">{{ $lapangan->harga_per_jam }}</td>
                            <td data-label="Gambar">
                                @if($lapangan->gambar)
                                <img src="{{ asset('storage/lapangan/' . $lapangan->gambar) }}" alt="Gambar"
                                    style="max-width: 100px;">
                                @else
                                <em>Tidak ada</em>
                                @endif
                            </td>
                            <td data-label="Status">{{ $lapangan->status_aktif ? 'Aktif' : 'Nonaktif' }}</td>
                            <td data-label="Aksi">
                                <a href="{{ route('admin.lapangan.edit', $lapangan->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.lapangan.destroy', $lapangan->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Yakin hapus lapangan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </section>

        </div>

    </div>
</body>

</html>