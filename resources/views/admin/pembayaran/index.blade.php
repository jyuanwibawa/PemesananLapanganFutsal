<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Admin - Pengelolaan Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-pembayaran.css') }}" />
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
                <h2>Pengelolaan Pembayaran</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Booking</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayarans as $bayar)
                        <tr>
                            <td>{{ $bayar->pengguna->nama }}</td>
                            <td>{{ $bayar->booking->lapangan->nama_lapangan }} ({{ $bayar->booking->tanggal_booking }})
                            </td>
                            <td>{{ $bayar->metode_bayar }}</td>
                            <td>{{ $bayar->status_verifikasi }}</td>
                            <td>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.pembayaran.destroy', $bayar->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?');">Hapus</button>
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