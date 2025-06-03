@extends('layout.admin')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="mb-4 text-primary">📝 Edit Catatan Barang</h2>

            <form action="{{ route('catatan.update', $catatan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="toko_id" class="form-label">Toko</label>
                    <select name="toko_id" id="toko_id" class="form-select" required>
                        <option value="">-- Pilih Toko --</option>
                        @foreach ($toko as $t)
                            <option value="{{ $t->id }}" {{ $catatan->toko_id == $t->id ? 'selected' : '' }}>
                                {{ $t->nama_toko }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $catatan->nama_barang }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $catatan->tanggal }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ $catatan->deskripsi }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('catatan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <footer class="text-center py-4 shadow mt-auto">
        <p class="mb-0 fw-dark">&copy; 2025 <span class="fw-bold">Catatan Penjualan</span> | Powered by Laravel</p>
    </footer>
@endsection