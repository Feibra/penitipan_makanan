@extends('layout.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">✏️ Edit Toko</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('toko.update', $toko->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $toko->nama_toko }}" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-success">
                            💾 Simpan Perubahan
                        </button>
                    </div>

                    <!-- Button Back -->
                    <div class="d-grid">
                        <a href="{{ route('toko.index') }}" class="btn btn-secondary">
                            🔙 Kembali ke Daftar Toko
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <footer class="text-center py-4 shadow mt-auto">
        <p class="mb-0 fw-dark">&copy; 2025 <span class="fw-bold">Catatan Penjualan</span> | Powered by Laravel</p>
    </footer>
@endsection