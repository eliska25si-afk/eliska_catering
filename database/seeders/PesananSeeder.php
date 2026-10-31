<?php

namespace Database\Seeders;

use App\Models\PaketCatering;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggans = collect([
            ['nama' => 'Budi Santoso', 'email' => 'budi@example.com', 'no_hp' => '081234567801', 'alamat' => 'Jl. Sudirman No. 10, Pekanbaru'],
            ['nama' => 'Siti Aminah',  'email' => 'siti@example.com', 'no_hp' => '081234567802', 'alamat' => 'Jl. Arifin Achmad No. 5, Pekanbaru'],
            ['nama' => 'Rudi Hartono', 'email' => 'rudi@example.com', 'no_hp' => '081234567803', 'alamat' => 'Jl. Soekarno Hatta No. 21, Pekanbaru'],
        ])->map(fn ($d) => Pelanggan::firstOrCreate(['email' => $d['email']], $d))->values();

        $pakets = collect([
            ['nama_paket' => 'Paket Sehat Hemat',  'jenis' => 'Harian',   'harga' => 25000, 'deskripsi' => 'Nasi, lauk, sayur, buah'],
            ['nama_paket' => 'Paket Mingguan Keluarga', 'jenis' => 'Mingguan', 'harga' => 30000, 'deskripsi' => 'Menu berganti setiap hari'],
            ['nama_paket' => 'Paket Prasmanan Acara', 'jenis' => 'Acara', 'harga' => 45000, 'deskripsi' => 'Prasmanan untuk pesta/acara'],
        ])->map(fn ($d) => PaketCatering::firstOrCreate(['nama_paket' => $d['nama_paket']], $d))->values();

        // [index pelanggan, index paket, tanggal, porsi, status]
        $data = [
            [0, 0, '2026-10-05', 20,  'Selesai'],
            [0, 2, '2026-10-12', 100, 'Selesai'],
            [1, 1, '2026-10-15', 35,  'Diproses'],
            [1, 0, '2026-10-18', 15,  'Dibatalkan'],
            [2, 2, '2026-10-25', 150, 'Menunggu'],
            [2, 1, '2026-10-28', 40,  'Selesai'],
        ];

        foreach ($data as [$p, $k, $tgl, $porsi, $status]) {
            Pesanan::create([
                'pelanggan_id'      => $pelanggans[$p]->id,
                'paket_catering_id' => $pakets[$k]->id,
                'tanggal_acara'     => $tgl,
                'jumlah_porsi'      => $porsi,
                'total_harga'       => $pakets[$k]->harga * $porsi,
                'status'            => $status,
            ]);
        }
    }
}
