<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

/**
 * Login dengan Google (OAuth 2.0) memakai Laravel Socialite.
 */
class GoogleController extends Controller
{
    /* 1) Arahkan user ke halaman login Google */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /* 2) Google mengembalikan user ke sini (callback) */
    public function callback()
    {
        try {
            $google = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            Log::error('Login Google gagal: ' . $e->getMessage());

            return redirect()
                ->route('login')
                ->with('error', 'Login dengan Google gagal atau dibatalkan. Silakan coba lagi.');
        }

        // Cari berdasarkan google_id, kalau belum ada cari berdasarkan email
        $user = User::where('google_id', $google->getId())
            ->orWhere('email', $google->getEmail())
            ->first();

        if ($user) {
            // Akun sudah ada -> hubungkan dengan Google (role tidak diubah)
            $user->update([
                'google_id' => $user->google_id ?: $google->getId(),
                'avatar'    => $google->getAvatar(),
            ]);
        } else {
            // Akun baru -> otomatis role Pelanggan
            $user = User::create([
                'name'      => $google->getName() ?: $google->getNickname() ?: 'Pengguna Google',
                'email'     => $google->getEmail(),
                'google_id' => $google->getId(),
                'avatar'    => $google->getAvatar(),
                'password'  => Str::random(32), // di-hash otomatis oleh cast 'hashed'
                'role'      => User::ROLE_PELANGGAN,
            ]);
            $user->forceFill(['email_verified_at' => now()])->save();
        }

        Auth::login($user, true);
        request()->session()->regenerate();

        return redirect()
            ->intended(route('dashboard'))
            ->with('success', "Login dengan Google berhasil. Anda masuk sebagai {$user->roleLabel()}.");
    }
}
