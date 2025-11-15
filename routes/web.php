<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\AuthController;
use App\Http\Controllers\PoskoBencanaController;
use App\Http\Controllers\Guest\TentangController;
use App\Http\Controllers\KejadianBencanaController;
use App\Http\Controllers\Guest\KebencanaanController;

// ------------------------
// Guest / Public routes
// ------------------------
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/', function () {
    return view('pages.main.dashboard');
});

// ------------------------
// Auth & Kejadian
// ------------------------
Route::get('/kejadian', [KebencanaanController::class, 'index']);
//Route::get('/guest/auth', [AuthController::class, 'index']);
//Route::post('/guest/auth', [AuthController::class, 'login']);

// ------------------------
// Dashboard
// ------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// ------------------------
// Resource routes
// ------------------------
Route::resource('warga', WargaController::class);
Route::resource('posko', PoskoBencanaController::class);

Route::resource('user', UserController::class);
Route::resource('login', LoginController::class)->only(['index', 'store', 'destroy']);


Route::resource('tentang', TentangController::class)->only(['index']);

//Kejadian Route
Route::resource('kejadian', KejadianBencanaController::class);
