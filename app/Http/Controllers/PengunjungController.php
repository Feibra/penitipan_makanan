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
        $toko = Toko::all(); // Tampilkan semua event
        $catatanbarang = CatatanBarang::all();
        $userRegistrations = Auth::user()->registrations; // Ambil pendaftaran pengguna
        return view('pengunjung.dashboard', compact('toko', 'catatanbarang', 'userRegistrations'));
    }

    public function tokoPengunjung(Request $request)
{
    $toko = Toko::all();

    $query = Toko::query();

    // Cek apakah ada keyword search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_toko', 'like', '%' . $request->search . '%');
    }

    $toko = $query->get();

    return view('toko/toko_pengunjung', compact('toko'));
}

public function catatanPengunjung(Request $request)
{
    
    $catatan = CatatanBarang::with('toko')->get();

    $query = CatatanBarang::with('toko');

    // Cek apakah ada keyword search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_barang', 'like', '%' . $request->search . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
    }

    $catatan = $query->get();
    
    return view('catatan/catatan_pengunjung', compact('catatan'));
}

}
