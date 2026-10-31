@extends('layouts.app')

@section('title', 'Laporan Pesanan - Eliska Catering')

@section('content')
<h2>Laporan Pesanan <span class="badge text-bg-success fs-6">Query Builder</span></h2>
<p class="text-muted">Pesanan berstatus <em>Dibatalkan</em> tidak dihitung pada ringkasan, pendapatan paket, dan pelanggan teratas.</p>

<form method="GET" action="{{ route('laporan.index') }}" class="row g-2 mb-4">
    <div class="col-auto">
        <label class="form-label mb-0">Dari tanggal</label>
        <input type="date" name="dari" value="{{ $dari }}" class="form-control">
    </div>
    <div class="col-auto">
        <label class="form-label mb-0">Sampai tanggal</label>
        <input type="date" name="sampai" value="{{ $sampai }}" class="form-control">
    </div>
    <div class="col-auto align-self-end">
        <button class="btn btn-primary">Tampilkan</button>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center"><div class="card-body">
            <div class="text-muted">Total Pesanan</div>
            <div class="fs-3">{{ $ringkasan->total_pesanan }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card text-center"><div class="card-body">
            <div class="text-muted">Total Porsi</div>
            <div class="fs-3">{{ number_format($ringkasan->total_porsi, 0, ',', '.') }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card text-center"><div class="card-body">
            <div class="text-muted">Total Pendapatan</div>
            <div class="fs-3">Rp {{ number_format($ringkasan->total_pendapatan, 0, ',', '.') }}</div>
        </div></div>
    </div>
</div>

<h5>Pendapatan per Paket</h5>
<table class="table table-bordered table-striped mb-4">
    <thead class="table-dark">
        <tr><th>Paket</th><th>Jenis</th><th>Jumlah Pesanan</th><th>Total Porsi</th><th>Pendapatan</th></tr>
    </thead>
    <tbody>
        @forelse($perPaket as $row)
            <tr>
                <td>{{ $row->nama_paket }}</td>
                <td>{{ $row->jenis }}</td>
                <td>{{ $row->jumlah_pesanan }}</td>
                <td>{{ $row->total_porsi }}</td>
                <td>Rp {{ number_format($row->pendapatan, 0, ',', '.') }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="row">
    <div class="col-md-7">
        <h5>5 Pelanggan Teratas</h5>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr><th>Pelanggan</th><th>No HP</th><th>Jumlah Pesanan</th><th>Total Belanja</th></tr>
            </thead>
            <tbody>
                @forelse($topPelanggan as $row)
                    <tr>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>{{ $row->jumlah_pesanan }}</td>
                        <td>Rp {{ number_format($row->total_belanja, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="col-md-5">
        <h5>Rekap per Status</h5>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr><th>Status</th><th>Jumlah</th></tr>
            </thead>
            <tbody>
                @forelse($perStatus as $row)
                    <tr><td>{{ $row->status }}</td><td>{{ $row->jumlah }}</td></tr>
                @empty
                    <tr><td colspan="2" class="text-center">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
