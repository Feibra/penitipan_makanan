<?php

namespace App\Http\Controllers;

use App\Models\CatatanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Toko;

class PengunjungController extends Controller
{
    public function index()
    {
        $toko = Toko::paginate(10); // Tampilkan semua event
        $catatanbarang = CatatanBarang::paginate(10);
        $userRegistrations = Auth::user()->registrations; // Ambil pendaftaran pengguna
        return view('pengunjung.dashboard', compact('toko', 'catatanbarang', 'userRegistrations'));
    }

    public function tokoPengunjung(Request $request)
{
    $query = Toko::query();

    // Cek apakah ada keyword search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_toko', 'like', '%' . $request->search . '%');
    }

    $toko = $query->paginate(10);

    return view('toko/toko_pengunjung', compact('toko'));
}

public function catatanPengunjung(Request $request)
{

    $query = CatatanBarang::with('toko');

    // Cek apakah ada keyword search
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('nama_barang', 'like', "%$search%")
              ->orWhere('tanggal', 'like', "%$search%")
              ->orWhereHas('toko', function ($t) use ($search) {
                  $t->where('nama_toko', 'like', "%$search%");
              });
        });
    }

    $catatan = $query->paginate(10);
    $toko = Toko::all();
    
    return view('catatan/catatan_pengunjung', compact('catatan', 'toko'));
}

}
