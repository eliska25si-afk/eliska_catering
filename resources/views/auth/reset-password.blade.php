@extends('layouts.auth')

@section('title', 'Reset Password - Eliska Catering')

@section('content')
<h3 class="fw-bold mb-1" style="color: var(--navy)">Reset Password</h3>
<p class="text-muted mb-4">Buat password baru untuk akun Anda.</p>

<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $email) }}" readonly>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Password Baru</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control" autofocus>
        </div>
    </div>

    <div class="mb-4">
        <label class="form-label">Konfirmasi Password Baru</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">
        <i class="bi bi-check2-circle"></i> Simpan Password Baru
    </button>
</form>
@endsection
