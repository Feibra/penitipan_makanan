@extends('layout.admin')

@section('content')
<div class="container mt-4 mb-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-6">
                    <h4 class="text-success m-0">
                        <i class="fas fa-box-open me-2"></i>Daftar Catatan Barang
                    </h4>
                </div>
                <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                    <a href="{{ route('catatan.create') }}" class="btn btn-success px-3">
                        <i class="fas fa-plus me-1"></i> Tambah Catatan
                    </a>
                </div>
            </div>

            <form method="GET" action="{{ route('catatan.index') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari Catatan..." value="{{ request()->get('search') }}">
                    <button class="btn btn-primary" type="submit">🔍 Cari</button>
                </div>
            </form>
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th>Toko</th>
                            <th>Nama</th>
                            <th>Date</th></th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($catatan as $c)
                            <tr>
                                <td class="text-break">{{ $c->toko->nama_toko }}</td>
                                <td class="text-break">{{ $c->nama_barang }}</td>
                                <td>{{ \Carbon\Carbon::parse($c->tanggal)->format('d M Y') }}</td>
                                <td class="text-break">{{ $c->deskripsi }}</td>
                                <td class="text-center">
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('catatan.edit', $c->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0 me-md-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('catatan.destroy', $c->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada catatan barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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