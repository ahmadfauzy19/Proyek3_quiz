<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangNota extends Model
{
    protected $table = 'barang_nota';
    public $timestamps = true;

    protected $fillable = [
        'kode_nota', 'kode_barang', 'jumlah_barang', 'harga_satuan', 'jumlah'
    ];

    protected $primaryKey = null;
}

