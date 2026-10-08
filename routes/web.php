<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketCateringController;
use App\Http\Controllers\MenuMakananController;

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
    return view('admin.dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('paket', PaketCateringController::class);
Route::resource('menu', MenuMakananController::class);