<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Halaman Laporan  ->  memakai QUERY BUILDER (DB::table)
 * Tidak memakai Model sama sekali; hasilnya berupa objek stdClass biasa.
 */
class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $dari   = $request->query('dari');
        $sampai = $request->query('sampai');

        // Filter dipakai ulang di query laporan pendapatan.
        // when() = kondisi hanya ditambahkan kalau nilainya diisi.
        $filter = function ($query) use ($dari, $sampai) {
            $query->where('pesanans.status', '!=', 'Dibatalkan')
                  ->when($dari, fn ($q) => $q->whereDate('pesanans.tanggal_acara', '>=', $dari))
                  ->when($sampai, fn ($q) => $q->whereDate('pesanans.tanggal_acara', '<=', $sampai));
        };

        // 1. Ringkasan (aggregate)
        $ringkasan = DB::table('pesanans')
            ->tap($filter)
            ->selectRaw('COUNT(*) as total_pesanan,
                         COALESCE(SUM(pesanans.jumlah_porsi), 0) as total_porsi,
                         COALESCE(SUM(pesanans.total_harga), 0) as total_pendapatan')
            ->first();

        // 2. Pendapatan per paket (JOIN + GROUP BY)
        $perPaket = DB::table('pesanans')
            ->join('paket_caterings', 'paket_caterings.id', '=', 'pesanans.paket_catering_id')
            ->tap($filter)
            ->select('paket_caterings.nama_paket', 'paket_caterings.jenis')
            ->selectRaw('COUNT(pesanans.id) as jumlah_pesanan,
                         SUM(pesanans.jumlah_porsi) as total_porsi,
                         SUM(pesanans.total_harga) as pendapatan')
            ->groupBy('paket_caterings.id', 'paket_caterings.nama_paket', 'paket_caterings.jenis')
            ->orderByDesc('pendapatan')
            ->get();

        // 3. 5 pelanggan teratas (JOIN + GROUP BY + LIMIT)
        $topPelanggan = DB::table('pesanans')
            ->join('pelanggans', 'pelanggans.id', '=', 'pesanans.pelanggan_id')
            ->tap($filter)
            ->select('pelanggans.nama', 'pelanggans.no_hp')
            ->selectRaw('COUNT(pesanans.id) as jumlah_pesanan,
                         SUM(pesanans.total_harga) as total_belanja')
            ->groupBy('pelanggans.id', 'pelanggans.nama', 'pelanggans.no_hp')
            ->orderByDesc('total_belanja')
            ->limit(5)
            ->get();

        // 4. Rekap per status (semua status, termasuk Dibatalkan)
        $perStatus = DB::table('pesanans')
            ->select('status', DB::raw('COUNT(*) as jumlah'))
            ->when($dari, fn ($q) => $q->whereDate('tanggal_acara', '>=', $dari))
            ->when($sampai, fn ($q) => $q->whereDate('tanggal_acara', '<=', $sampai))
            ->groupBy('status')
            ->orderBy('status')
            ->get();

        return view('laporan.index', compact(
            'ringkasan', 'perPaket', 'topPelanggan', 'perStatus', 'dari', 'sampai'
        ));
    }
}
