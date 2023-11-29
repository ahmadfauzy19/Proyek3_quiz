<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = 'kasir';
    protected $primaryKey = 'id_kasir';
    public $timestamps = true;

    // Definisi relasi atau method lainnya jika diperlukan
}

