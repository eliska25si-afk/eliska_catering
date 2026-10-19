@extends('layouts.app')

@section('title', 'Tambah User - Eliska Catering')

@section('content')
<h2>Tambah User</h2>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            @include('users._form')

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection