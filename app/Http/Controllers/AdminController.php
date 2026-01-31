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
        $toko = Toko::paginate(10); // Tampilkan semua 
        $catatanbarang = CatatanBarang::paginate(10);
        $userRegistrations = Auth::user()->registrations; // Ambil pendaftaran pengguna
        return view('admin.dashboard', compact('toko', 'catatanbarang', 'userRegistrations'));
    }

    public function tokoAdmin(Request $request)
{

    $query = Toko::query();

    // Cek apakah ada keyword search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_toko', 'like', '%' . $request->search . '%');
    }

    $toko = $query->paginate(10);

    return view('toko.index', compact('toko'));
}

public function catatanAdmin(Request $request)
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

    return view('catatan.index', compact('catatan', 'toko'));
}
}
