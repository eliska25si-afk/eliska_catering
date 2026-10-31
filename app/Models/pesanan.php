<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    public const STATUS = ['Menunggu', 'Diproses', 'Selesai', 'Dibatalkan'];

    protected $fillable = [
        'pelanggan_id',
        'paket_catering_id',
        'tanggal_acara',
        'jumlah_porsi',
        'total_harga',
        'status',
    ];

    // Casting: kolom tanggal_acara otomatis jadi objek Carbon
    protected function casts(): array
    {
        return [
            'tanggal_acara' => 'date',
        ];
    }

    // ===== RELASI =====
    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function paket(): BelongsTo
    {
        return $this->belongsTo(PaketCatering::class, 'paket_catering_id');
    }

    // ===== LOCAL SCOPE =====
    // dipakai: Pesanan::status('Selesai')->get()
    public function scopeStatus($query, ?string $status)
    {
        return $status ? $query->where('status', $status) : $query;
    }

    // ===== ACCESSOR =====
    // dipakai di blade: $pesanan->badge  => warna badge bootstrap
    protected function badge(): Attribute
    {
        return Attribute::get(fn () => match ($this->status) {
            'Menunggu'   => 'secondary',
            'Diproses'   => 'warning',
            'Selesai'    => 'success',
            'Dibatalkan' => 'danger',
            default      => 'light',
        });
    }
}
