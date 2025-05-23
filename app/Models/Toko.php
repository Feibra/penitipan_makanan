<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';
    
    protected $fillable = ['nama_toko'];

    public function catatan()
    {
        return $this->hasMany(CatatanBarang::class);
    }
}
