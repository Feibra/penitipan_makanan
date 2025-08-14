@extends('layout.admin')

@section('content')
<div class="container mt-5">

    <!-- Tombol Lihat Toko -->
    <div class="text-center mb-3">
        <button class="btn btn-outline-success" data-bs-toggle="collapse" data-bs-target="#tabelToko">
            Daftar Toko
        </button>
    </div>

    <!-- Tabel Toko -->
    <div id="tabelToko" class="collapse">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Daftar Toko</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
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
                <div class="d-flex justify-content-center">
                    {{ $toko->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Lihat Catatan -->
    <div class="text-center mb-3">
        <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#tabelCatatan">
            Daftar Catatan Barang
        </button>
    </div>

    <!-- Tabel Catatan Barang -->
    <div id="tabelCatatan" class="collapse">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Daftar Catatan Barang</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
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
                            <td>{{ $c->tanggal }}</td>
                            <td>{{ $c->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $catatanbarang->links() }}
                </div>
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
