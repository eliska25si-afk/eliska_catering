@extends('layouts.app')

@section('title', 'Dashboard - Eliska Catering')

@section('content')
<style>
    .hero {
        background: linear-gradient(120deg, rgba(11,42,91,.92), rgba(29,78,216,.80)),
                    url('{{ asset('catering-services-website-template/img/background-site.jpg') }}') center/cover;
        border-radius: 1.25rem; color: #fff; box-shadow: 0 12px 30px rgba(29,78,216,.30); border-bottom: 5px solid #f59e0b;
    }
    main.page .hero h2::after { display: none; }
    .stat-card { border: 0; border-radius: 1rem; box-shadow: 0 2px 10px rgba(0,0,0,.07); transition: transform .15s; }
    .stat-card:hover { transform: translateY(-3px); }
    .stat-icon { width: 52px; height: 52px; border-radius: 14px; display:flex; align-items:center; justify-content:center; font-size: 1.5rem; }
    .menu-img { height: 150px; object-fit: cover; border-radius: 1rem 1rem 0 0; }
    .soft-card { border: 0; border-radius: 1rem; box-shadow: 0 4px 18px rgba(29,78,216,.08); }
</style>

{{-- ================= HERO ================= --}}
<div class="hero p-4 p-md-5 mb-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <span class="badge bg-light text-dark mb-2">
                <i class="bi bi-person-badge"></i> {{ $user->roleLabel() }}
            </span>
            <h2 class="fw-bold mb-1 text-white">Halo, {{ $user->name }}! 👋</h2>
            <p class="mb-0 opacity-90">
                @if($user->isAdmin())
                    Pantau pesanan, paket, dan menu Eliska Catering dalam satu tempat.
                @else
                    Selamat datang di Eliska Catering — hidangan lezat untuk setiap acara Anda.
                @endif
            </p>
        </div>
        <i class="bi bi-cup-hot-fill" style="font-size: 4.5rem; opacity:.35;"></i>
    </div>
</div>

@if($user->isAdmin())
{{-- ================= ADMIN ================= --}}
<div class="row g-3 mb-4">
    @php
        $cards = [
            ['Pesanan',   $stats['pesanan'],   'bi-receipt',        'bg-warning-subtle text-warning-emphasis', route('pesanan.index')],
            ['Pelanggan', $stats['pelanggan'], 'bi-people-fill',    'bg-primary-subtle text-primary-emphasis', route('pelanggan.index')],
            ['Paket',     $stats['paket'],     'bi-box-seam-fill',  'bg-info-subtle text-info-emphasis', route('paket.index')],
            ['Menu',      $stats['menu'],      'bi-egg-fried',      'bg-success-subtle text-success-emphasis',   route('menu.index')],
        ];
    @endphp
    @foreach($cards as [$label, $value, $icon, $color, $link])
        <div class="col-6 col-lg-3">
            <a href="{{ $link }}" class="text-decoration-none text-dark">
                <div class="card stat-card h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="stat-icon {{ $color }}"><i class="bi {{ $icon }}"></i></div>
                        <div>
                            <div class="text-muted small">Total {{ $label }}</div>
                            <div class="fs-3 fw-bold lh-1">{{ $value }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row g-3 mb-4">
    <div class="col-lg-5">
        <div class="card soft-card h-100">
            <div class="card-body">
                <div class="text-muted small"><i class="bi bi-cash-coin"></i> Total Pendapatan</div>
                <div class="display-6 fw-bold text-success">Rp {{ number_format($stats['pendapatan'], 0, ',', '.') }}</div>
                <small class="text-muted">Tidak termasuk pesanan berstatus Dibatalkan</small>

                <hr>
                <div class="fw-semibold mb-2">Pesanan per Status</div>
                @forelse($perStatus as $status => $total)
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>{{ $status }}</span>
                        <span class="badge bg-primary rounded-pill">{{ $total }}</span>
                    </div>
                @empty
                    <div class="text-muted">Belum ada pesanan.</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card soft-card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0"><i class="bi bi-clock-history"></i> Pesanan Terbaru</h5>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-sm btn-outline-dark">Lihat semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr><th>Pelanggan</th><th>Paket</th><th>Tanggal</th><th class="text-end">Total</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                        @forelse($pesananTerbaru as $p)
                            <tr>
                                <td>{{ $p->pelanggan }}</td>
                                <td>{{ $p->nama_paket }}<div class="text-muted small">{{ $p->jumlah_porsi }} porsi</div></td>
                                <td>{{ \Carbon\Carbon::parse($p->tanggal_acara)->format('d M Y') }}</td>
                                <td class="text-end">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge
                                        @switch($p->status)
                                            @case('Selesai') bg-success @break
                                            @case('Dibatalkan') bg-danger @break
                                            @case('Diproses') bg-info @break
                                            @default bg-warning text-dark
                                        @endswitch">{{ $p->status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pesanan.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<h5 class="mb-3">Aksi Cepat</h5>
<div class="d-flex flex-wrap gap-2 mb-4">
    <a href="{{ route('pesanan.create') }}" class="btn btn-warning"><i class="bi bi-plus-circle"></i> Pesanan Baru</a>
    <a href="{{ route('menu.create') }}" class="btn btn-outline-primary"><i class="bi bi-egg-fried"></i> Tambah Menu</a>
    <a href="{{ route('paket.create') }}" class="btn btn-outline-primary"><i class="bi bi-box-seam"></i> Tambah Paket</a>
    <a href="{{ route('laporan.index') }}" class="btn btn-outline-primary"><i class="bi bi-bar-chart-line"></i> Laporan</a>
    <a href="{{ route('users.index') }}" class="btn btn-outline-primary"><i class="bi bi-person-gear"></i> Data User ({{ $stats['user'] }})</a>
</div>

@else
{{-- ================= PELANGGAN ================= --}}
<h5 class="mb-3"><i class="bi bi-box-seam-fill text-primary"></i> Paket Catering Kami</h5>
<div class="row g-3 mb-4">
    @forelse($paketList as $paket)
        <div class="col-md-4">
            <div class="card soft-card h-100">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">{{ $paket->jenis }}</span>
                    <h5 class="fw-bold">{{ $paket->nama_paket }}</h5>
                    <p class="text-muted small mb-3">{{ \Illuminate\Support\Str::limit($paket->deskripsi, 90) }}</p>
                    <div class="fs-5 fw-bold text-success">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><div class="alert alert-light border">Paket catering akan segera tersedia.</div></div>
    @endforelse
</div>

<h5 class="mb-3"><i class="bi bi-egg-fried text-warning"></i> Menu Favorit</h5>
@php $imgs = ['menu-01','menu-02','menu-03','menu-04','menu-05','menu-06']; @endphp
<div class="row g-3 mb-4">
    @forelse($menuList as $i => $menu)
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card soft-card h-100">
                <img class="menu-img" alt="{{ $menu->nama_menu }}"
                     src="{{ asset('catering-services-website-template/img/' . $imgs[$i % count($imgs)] . '.jpg') }}">
                <div class="card-body p-2">
                    <div class="fw-semibold small">{{ $menu->nama_menu }}</div>
                    <div class="text-muted" style="font-size:.75rem">{{ $menu->kategori }}</div>
                    <div class="text-success fw-bold small">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><div class="alert alert-light border">Menu akan segera tersedia.</div></div>
    @endforelse
</div>

<div class="alert alert-info">
    <i class="bi bi-info-circle"></i>
    Anda login sebagai <strong>Pelanggan</strong>. Pengelolaan data hanya dapat diakses oleh Admin.
</div>
@endif
@endsection
