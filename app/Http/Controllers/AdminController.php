<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatatanBarang;
use Illuminate\Support\Facades\Auth;
use App\Models\Toko;

class AdminController extends Controller
{
    public function index()
    {
        $toko = Toko::all(); // Tampilkan semua 
        $catatanbarang = CatatanBarang::all();
        $userRegistrations = Auth::user()->registrations; // Ambil pendaftaran pengguna
        return view('admin.dashboard', compact('toko', 'catatanbarang', 'userRegistrations'));
    }

    public function tokoAdmin(Request $request)
{
    $toko = Toko::all();

    $query = Toko::query();

    // Cek apakah ada keyword search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_toko', 'like', '%' . $request->search . '%');
    }

    $toko = $query->get();

    return view('toko.index', compact('toko'));
}

public function catatanAdmin(Request $request)
{
    $catatan = CatatanBarang::with('toko')->get();

    $query = CatatanBarang::with('toko');

    // Cek apakah ada keyword search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_barang', 'like', '%' . $request->search . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
    }

    $catatan = $query->get();

    return view('catatan.index', compact('catatan'));
}
}
