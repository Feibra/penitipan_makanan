<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatatanBarang extends Model
{
    use HasFactory;

    protected $table = 'catatan_barang';

    protected $fillable = ['toko_id', 'nama_barang', 'tanggal', 'deskripsi'];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
