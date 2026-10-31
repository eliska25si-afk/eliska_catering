@extends('layouts.app')

@section('title', 'Data Pesanan - Eliska Catering')

@section('content')
<h2>Data Pesanan <span class="badge text-bg-info fs-6">Eloquent ORM</span></h2>

<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('pesanan.create') }}" class="btn btn-primary">+ Tambah Pesanan</a>

    <form method="GET" action="{{ route('pesanan.index') }}" class="d-flex gap-2">
        <select name="status" class="form-select">
            <option value="">Semua Status</option>
            @foreach(\App\Models\Pesanan::STATUS as $status)
                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-outline-secondary">Filter</button>
    </form>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Paket</th>
            <th>Tgl Acara</th>
            <th>Porsi</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pesanans as $pesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->pelanggan->nama }}</td>
                <td>{{ $pesanan->paket->nama_paket }}</td>
                <td>{{ $pesanan->tanggal_acara->format('d-m-Y') }}</td>
                <td>{{ $pesanan->jumlah_porsi }}</td>
                <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                <td><span class="badge text-bg-{{ $pesanan->badge }}">{{ $pesanan->status }}</span></td>
                <td>
                    <a href="{{ route('pesanan.edit', $pesanan) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('pesanan.destroy', $pesanan) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada data pesanan.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
