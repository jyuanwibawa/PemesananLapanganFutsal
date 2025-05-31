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
            <td>{{ $bayar->booking->lapangan->nama_lapangan }} ({{ $bayar->booking->tanggal_booking }})</td>
            <td>{{ $bayar->metode_bayar }}</td>
            <td>{{ $bayar->status_verifikasi }}</td>
            <td>
                <a href="{{ route('admin.pembayaran.edit', $bayar->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>