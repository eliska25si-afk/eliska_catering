<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketCatering extends Model
{
    protected $fillable = [
        'nama_paket',
        'jenis',
        'harga',
        'deskripsi'
    ];

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'paket_catering_id');
    }
}

