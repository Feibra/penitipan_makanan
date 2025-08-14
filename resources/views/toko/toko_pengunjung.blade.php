@extends('layout.pengunjung')

@section('content')
<div class="card shadow-sm mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Daftar Toko</h4>
        </div>

        <form method="GET" action="{{ route('pengunjung.toko') }}" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari Nama Toko..." value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
                    @if($toko->isEmpty())
                    <tr>
                        <td class="text-center">Belum ada data toko.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                    {{ $toko->links() }}
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