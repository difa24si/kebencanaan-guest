<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoskoBencanaController;
use App\Http\Controllers\Guest\TentangController;
use App\Http\Controllers\KejadianBencanaController;
use App\Http\Controllers\Guest\KebencanaanController;

// ------------------------
// Guest / Public routes
// ------------------------
Route::get('/mahasiswa', fn() => 'Halo Mahasiswa');
Route::get('/pcr', fn() => 'Selamat Datang di Website Kampus PCR!');
Route::get('/nama/{param1}', fn($param1) => 'Nama saya: ' . $param1);
Route::get('/nim/{param1?}', fn($param1 = '') => 'NIM saya: ' . $param1);

Route::get('/', function () {
    return view('pages.main.dashboard');
});

// ------------------------
// Auth & Kejadian Guest
// ------------------------
Route::get('/kejadian', [KebencanaanController::class, 'index']);

// ------------------------
// Dashboard
// ------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('checkislogin');

// ------------------------
// Resource routes
// ------------------------
Route::resource('warga', WargaController::class);
Route::resource('posko', PoskoBencanaController::class);

Route::group(['middleware' => ['checkrole:admin']], function () {

    Route::resource('user', UserController::class);
});

Route::resource('login', LoginController::class)->only(['index', 'store', 'destroy']);
Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::resource('tentang', TentangController::class)->only(['index']);
Route::resource('kejadian', KejadianBencanaController::class);

// ------------------------
// Donasi (Bina Desa)
// ------------------------
Route::resource('donasi', DonasiController::class);

// Tambahkan route detail manual
Route::get('/donasi/detail/{id}', [DonasiController::class, 'detail'])
    ->name('donasi.detail');


