@extends('layouts.app')

@section('title', 'Edit Pesanan - Eliska Catering')

@section('content')
<h2>Edit Pesanan</h2>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('pesanan.update', $pesanan) }}" method="POST">
            @csrf
            @method('PUT')

            @include('pesanan._form')

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
