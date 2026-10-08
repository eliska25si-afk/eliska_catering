<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi'
    ];
}
