<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /* ---------- LOGIN ---------- */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        // Role dibaca otomatis dari kolom users.role (ditampilkan di sidebar/header)
        $role = Auth::user()->roleLabel();

        return redirect()
            ->intended(route('dashboard'))
            ->with('success', "Login berhasil. Anda masuk sebagai {$role}.");
    }

    /* ---------- REGISTER (hanya role Pelanggan) ---------- */
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // role TIDAK diambil dari input user -> selalu pelanggan
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password'], // di-hash otomatis oleh cast 'hashed'
            'role'     => User::ROLE_PELANGGAN,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Registrasi berhasil. Anda terdaftar sebagai Pelanggan.');
    }

    /* ---------- LOGOUT ---------- */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Anda berhasil logout.');
    }
}
