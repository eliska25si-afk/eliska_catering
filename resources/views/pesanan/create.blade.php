@extends('layouts.app')

@section('title', 'Tambah Pesanan - Eliska Catering')

@section('content')
<h2>Tambah Pesanan</h2>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf

            @include('pesanan._form')

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
