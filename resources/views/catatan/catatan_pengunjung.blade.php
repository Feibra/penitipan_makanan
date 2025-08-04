@extends('layout.pengunjung')

@section('content')
<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-success mb-0">
                    <i class="fas fa-box-open me-2"></i> Daftar Catatan Barang
                </h2>
            </div>

            <form method="GET" action="{{ route('pengunjung.catatan') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari Catatan..." value="{{ request()->get('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th scope="col">Toko</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($catatan as $c)
                            <tr>
                                <td>{{ $c->toko->nama_toko }}</td>
                                <td>{{ $c->nama_barang }}</td>
                                <td>{{ \Carbon\Carbon::parse($c->tanggal)->format('d M Y') }}</td>
                                <td>{{ $c->deskripsi }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted">Belum ada catatan barang.</td>
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
        <p class="mb-0 fw-dark">&copy; 2025 <span class="fw-bold">Catatan Penjualan</span></p>
    </footer>
@endsection