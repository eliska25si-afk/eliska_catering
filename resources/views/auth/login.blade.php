@extends('layouts.auth')

@section('title', 'Login - Eliska Catering')

@section('content')
<h3 class="fw-bold mb-1" style="color: var(--navy)">Selamat Datang 👋</h3>
<p class="text-muted mb-4">Silakan login untuk melanjutkan.</p>

<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="nama@email.com"
                   value="{{ old('email') }}" autofocus>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="••••••••">
        </div>
    </div>

    <div class="mb-4 d-flex justify-content-between">
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Ingat saya</label>
        </div>
        <a href="{{ route('password.request') }}">Lupa password?</a>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        <i class="bi bi-box-arrow-in-right"></i> Login
    </button>
</form>

<p class="text-center mt-4 mb-0">
    Belum punya akun? <a href="{{ route('register') }}" class="fw-semibold">Daftar</a>
</p>
@endsection

