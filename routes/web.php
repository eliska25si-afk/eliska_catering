<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketCateringController;
use App\Http\Controllers\MenuMakananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'hallo selamat datang di pcr!';
});

Route::get('/mahasiswa', function () {
    return 'Halo nama saya eliska';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'hallo eliska '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return '2557301032: '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

use App\Http\Controllers\MatakuliahController;

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);

Route::post('/matakuliah', [MatakuliahController::class, 'store']);

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

Route::get('/matakuliah/edit/{kode}', [MatakuliahController::class, 'edit']);

Route::put('/matakuliah/{kode}', [MatakuliahController::class, 'update']);

Route::delete('/matakuliah/{kode}', [MatakuliahController::class, 'destroy']);

Route::get('/admin', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'role:admin']);

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATION  (hanya untuk tamu / belum login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    // Register hanya membuat role Pelanggan (Admin dibuat lewat Seeder)
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');

    // Lupa Password -> kirim link -> reset password baru
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| AUTHORIZATION  (harus login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard: bisa diakses semua role (isi berbeda sesuai role)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Khusus ADMIN: kelola data
    Route::middleware('role:admin')->group(function () {
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('paket', PaketCateringController::class);
        Route::resource('menu', MenuMakananController::class);
        Route::resource('users', UserController::class)->except('show');
        Route::resource('pesanan', PesananController::class)->except('show');
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });
});
