@extends('layouts.app')

@section('title', 'Tambah Paket Catering - Eliska Catering')

@section('content')
<h2>Tambah Paket Catering</h2>

<div class="card mt-3">
    <div class="card-body">

        <form action="{{ route('paket.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Paket</label>

                <input type="text"
                       name="nama_paket"
                       class="form-control"
                       value="{{ old('nama_paket') }}"
                       placeholder="Contoh: Paket Sehat Hemat">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis</label>

                <select name="jenis" class="form-control">

                    <option value="">
                        -- Pilih Jenis --
                    </option>

                    <option value="Harian"
                        {{ old('jenis') == 'Harian' ? 'selected' : '' }}>
                        Harian
                    </option>

                    <option value="Mingguan"
                        {{ old('jenis') == 'Mingguan' ? 'selected' : '' }}>
                        Mingguan
                    </option>

                    <option value="Acara"
                        {{ old('jenis') == 'Acara' ? 'selected' : '' }}>
                        Acara
                    </option>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       value="{{ old('harga') }}"
                       placeholder="Contoh: 25000">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"
                          placeholder="Masukkan deskripsi paket">{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit"
                    class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('paket.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>
@endsection