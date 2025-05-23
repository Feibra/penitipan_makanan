@extends('layout.pengunjung')

@section('content')
<div class="container mt-5">

    <!-- Tombol Lihat Toko -->
    <div class="text-center mb-3">
        <button class="btn btn-success btn-lg px-4 shadow-sm" data-bs-toggle="collapse" data-bs-target="#tabelToko">
            👀 Lihat Daftar Toko
        </button>
    </div>

    <!-- Tabel Toko -->
    <div id="tabelToko" class="collapse">
        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-header bg-success bg-opacity-75 text-white rounded-top-4">
                <h5 class="mb-0"><i class="fas fa-store me-2"></i>Daftar Toko</h5>
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-success text-center">
                        <tr>
                            <th>Nama Toko</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($toko as $t)
                        <tr>
                            <td>{{ $t->nama_toko }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tombol Lihat Catatan -->
    <div class="text-center mb-3">
        <button class="btn btn-primary btn-lg px-4 shadow-sm" data-bs-toggle="collapse" data-bs-target="#tabelCatatan">
            👀 Lihat Catatan Barang
        </button>
    </div>

    <!-- Tabel Catatan Barang -->
    <div id="tabelCatatan" class="collapse">
        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-header bg-primary bg-opacity-75 text-white rounded-top-4">
                <h5 class="mb-0"><i class="fas fa-box-open me-2"></i>Daftar Catatan Barang</h5>
            </div>
            <div class="card-body bg-light rounded-bottom-4">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Toko</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catatanbarang as $c)
                        <tr>
                            <td>{{ $c->toko->nama_toko }}</td>
                            <td>{{ $c->nama_barang }}</td>
                            <td>{{ \Carbon\Carbon::parse($c->tanggal)->format('d M Y') }}</td>
                            <td class="text-truncate" style="max-width: 200px;">{{ $c->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer')
<footer class="text-center py-4 bg-white shadow mt-auto">
    <p class="mb-0 text-muted">&copy; 2025 <strong>Catatan Penjualan</strong> | Powered by Laravel</p>
</footer>
@endsection
