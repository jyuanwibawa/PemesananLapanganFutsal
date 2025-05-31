<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - Pengelolaan Fasilitas</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-fasilitas.css') }}" />
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
                <h2>Pengelolaan Fasilitas</h2>
                <a href="{{ route('admin.fasilitas.create') }}" class="btn-create">Tambah Fasilitas</a>
                <table>
                    <thead>
                        <tr>
                            <th>Lapangan</th>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fasilitas as $item)
                        <tr>
                            <td>{{ $item->lapangan->nama_lapangan }}</td>
                            <td>{{ $item->nama_fasilitas }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Yakin hapus fasilitas ini?')">Hapus</button>
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