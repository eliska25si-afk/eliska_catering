<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketCatering extends Model
{
    protected $fillable = [
        'nama_paket',
        'jenis',
        'harga',
        'deskripsi'
    ];
}
