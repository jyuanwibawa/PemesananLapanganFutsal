<h2>Pengelolaan Lapangan</h2>
<a href="{{ route('admin.lapangan.create') }}">Tambah Lapangan</a>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga / Jam</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lapangans as $lapangan)
        <tr>
            <td>{{ $lapangan->nama_lapangan }}</td>
            <td>{{ $lapangan->deskripsi }}</td>
            <td>{{ $lapangan->harga_per_jam }}</td>
            <td>{{ $lapangan->status_aktif ? 'Aktif' : 'Nonaktif' }}</td>
            <td>
                <a href="{{ route('admin.lapangan.edit', $lapangan->id) }}">Edit</a>
                <form action="{{ route('admin.lapangan.destroy', $lapangan->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus lapangan ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>