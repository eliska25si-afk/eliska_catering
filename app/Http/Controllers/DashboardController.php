<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = ['user' => $user];

        if ($user->isAdmin()) {
            $data['stats'] = [
                'pelanggan'  => DB::table('pelanggans')->count(),
                'paket'      => DB::table('paket_caterings')->count(),
                'menu'       => DB::table('menu_makanans')->count(),
                'pesanan'    => DB::table('pesanans')->count(),
                'pendapatan' => (int) DB::table('pesanans')->where('status', '!=', 'Dibatalkan')->sum('total_harga'),
                'user'       => User::count(),
            ];

            // 5 pesanan terbaru (Query Builder + join)
            $data['pesananTerbaru'] = DB::table('pesanans')
                ->join('pelanggans', 'pelanggans.id', '=', 'pesanans.pelanggan_id')
                ->join('paket_caterings', 'paket_caterings.id', '=', 'pesanans.paket_catering_id')
                ->select(
                    'pesanans.id',
                    'pelanggans.nama as pelanggan',
                    'paket_caterings.nama_paket',
                    'pesanans.tanggal_acara',
                    'pesanans.jumlah_porsi',
                    'pesanans.total_harga',
                    'pesanans.status'
                )
                ->latest('pesanans.created_at')
                ->limit(5)
                ->get();

            // jumlah pesanan per status
            $data['perStatus'] = DB::table('pesanans')
                ->select('status', DB::raw('COUNT(*) as total'))
                ->groupBy('status')
                ->pluck('total', 'status');
        } else {
            $data['paketList'] = DB::table('paket_caterings')->latest()->limit(3)->get();
            $data['menuList']  = DB::table('menu_makanans')->latest()->limit(6)->get();
        }

        return view('dashboard', $data);
    }
}

