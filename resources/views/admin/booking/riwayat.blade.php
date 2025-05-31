<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - Riwayat Booking</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-riwayat-booking.css') }}" />
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
                <h2>Riwayat Booking</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->pengguna->nama }}</td>
                            <td>{{ $booking->lapangan->nama_lapangan }}</td>
                            <td>{{ $booking->tanggal_booking }}</td>
                            <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Tidak ada data booking</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>

        </div>

    </div>
</body>

</html>