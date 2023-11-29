<?php

// app/Models/Nota.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'id_nota';
    public $timestamps = true;

    protected $fillable = [
        'kode_tenan', 'kode_kasir', 'tgl_nota', 'jam_nota', 'jumlah_belanja', 'diskon', 'total'
    ];

    // Definisi relasi atau method lainnya jika diperlukan
}

