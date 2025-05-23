@extends('layout.admin')

@section('content')
<div class="card shadow-sm mb-4 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">📋 Daftar Toko</h4>
            <a href="{{ route('toko.create') }}" class="btn btn-success btn-sm">+ Tambah Toko</a>
        </div>

        <form method="GET" action="{{ route('toko.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari Nama Toko..." value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">🔍 Cari</button>
            </div>
        </form>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Toko</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($toko as $t)
                    <tr>
                        <td>{{ $t->nama_toko }}</td>
                        <td>
                            <a href="{{ route('toko.edit', $t->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('toko.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus toko ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($toko->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center">Belum ada data toko.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <footer class="text-center py-4 mt-auto shadow">
        <p class="mb-0">&copy; 2025 <strong>Catatan Penjualan</strong> | Powered by Laravel</p>
    </footer>
@endsection
