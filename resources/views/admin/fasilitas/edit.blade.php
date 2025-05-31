<div class="container">
    <h2>Edit Fasilitas</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_lapangan">Pilih Lapangan</label>
            <select name="id_lapangan" id="id_lapangan" class="form-control" required>
                <option value="">-- Pilih Lapangan --</option>
                @foreach($lapangans as $lapangan)
                <option value="{{ $lapangan->id }}" {{ $lapangan->id == $fasilitas->id_lapangan ? 'selected' : '' }}>
                    {{ $lapangan->nama_lapangan }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama_fasilitas">Nama Fasilitas</label>
            <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control"
                value="{{ $fasilitas->nama_fasilitas }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $fasilitas->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>