<h2>Pengelolaan Fasilitas</h2>
<a href="{{ route('admin.fasilitas.create') }}">Tambah Fasilitas</a>
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
                <a href="{{ route('admin.fasilitas.edit', $item->id) }}">Edit</a>
                <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus fasilitas ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>