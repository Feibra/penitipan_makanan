<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        return view('toko.index', compact('toko'));
    }

    public function create()
    {
        return view('toko.create');
    }

    public function store(Request $request)
    {
        Toko::create($request->validate([
            'nama_toko' => 'required|string|max:255',
        ]));

        return redirect()->route('toko.index')->with('success', 'Toko berhasil ditambahkan.');
    }

    public function edit(Toko $toko)
    {
        return view('toko.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $toko->update($request->validate([
            'nama_toko' => 'required|string|max:255',
        ]));

        return redirect()->route('toko.index')->with('success', 'Toko berhasil diupdate.');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect()->route('toko.index')->with('success', 'Toko berhasil dihapus.');
    }
}
