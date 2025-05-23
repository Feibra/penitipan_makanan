<?php

namespace App\Http\Controllers;

use App\Models\CatatanBarang;
use App\Models\Toko;
use Illuminate\Http\Request;

class CatatanBarangController extends Controller
{
    public function index()
    {
        $catatan = CatatanBarang::with('toko')->get();
        return view('catatan.index', compact('catatan'));
    }

    public function create()
    {
        $toko = Toko::all();
        return view('catatan.create', compact('toko'));
    }

    public function store(Request $request)
    {
        CatatanBarang::create($request->validate([
            'toko_id' => 'required|exists:toko,id',
            'nama_barang' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable',
        ]));

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function edit(CatatanBarang $catatan)
    {
        $toko = Toko::all();
        return view('catatan.edit', compact('catatan', 'toko'));
    }

    public function update(Request $request, CatatanBarang $catatan)
    {
        $catatan->update($request->validate([
            'toko_id' => 'required|exists:toko,id',
            'nama_barang' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable',
        ]));

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil diupdate.');
    }

    public function destroy(CatatanBarang $catatan)
    {
        $catatan->delete();
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
