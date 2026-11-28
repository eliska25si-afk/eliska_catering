@extends('layouts.auth')

@section('title', 'Register - Eliska Catering')

@section('content')
<h3 class="fw-bold mb-1" style="color: var(--navy)">Buat Akun Pelanggan</h3>
<p class="text-muted mb-4">Daftar dan mulai pesan catering favorit Anda.</p>

<form action="{{ route('register.process') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control">
        </div>
    </div>

    <div class="mb-4">
        <label class="form-label">Konfirmasi Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        <i class="bi bi-person-plus"></i> Daftar
    </button>

    <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1 m-0"><span class="px-2 text-muted small">atau</span><hr class="flex-grow-1 m-0">
    </div>

    <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary w-100 py-2">
        <i class="bi bi-google text-danger"></i> Daftar dengan Google
    </a>
</form>

<p class="text-center mt-4 mb-0">
    Sudah punya akun? <a href="{{ route('login') }}" class="fw-semibold">Login</a>
</p>
@endsection
