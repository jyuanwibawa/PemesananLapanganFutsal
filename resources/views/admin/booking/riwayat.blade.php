<h2>Riwayat Booking</h2>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
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
            <td colspan="5" style="text-align:center;">Tidak ada data booking</td>
        </tr>
        @endforelse
    </tbody>
</table>