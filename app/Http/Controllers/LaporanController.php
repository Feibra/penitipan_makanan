<?php

namespace App\Http\Controllers;

use App\Models\CatatanBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{
    public function generatePDF(){
        $data = CatatanBarang::all();

        $pdf = PDF::loadview('laporan.penitipan', compact('data'))
                ->setPaper('a4', 'portrait');

        return $pdf->download('laporan_penitipan.pdf');
    }
    
}
