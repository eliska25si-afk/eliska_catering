@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<h2>Tambah Pelanggan</h2>

<form action="{{ route('pelanggan.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text"
               name="nama"
               class="form-control"
               value="{{ old('nama') }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input type="text"
               name="no_hp"
               class="form-control"
               value="{{ old('no_hp') }}">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat"
                  class="form-control">{{ old('alamat') }}</textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('pelanggan.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>

</form>
@endsection