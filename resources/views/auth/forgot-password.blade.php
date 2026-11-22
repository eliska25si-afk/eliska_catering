@extends('layouts.auth')

@section('title', 'Lupa Password - Eliska Catering')

@section('content')
<h3 class="fw-bold mb-1" style="color: var(--navy)">Lupa Password? 🔑</h3>
<p class="text-muted mb-4">Masukkan email Anda, kami akan mengirim link untuk mereset password.</p>

<form action="{{ route('password.email') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        <i class="bi bi-send"></i> Kirim Link Reset
    </button>
</form>

<p class="text-center mt-4 mb-0">
    <a href="{{ route('login') }}"><i class="bi bi-arrow-left"></i> Kembali ke Login</a>
</p>
@endsection

