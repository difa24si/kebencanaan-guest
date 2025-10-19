<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoskoController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\Guest\AuthController;
use App\Http\Controllers\Guest\KebencanaanController;
use Illuminate\Http\Request;

Route::post('/warga/store', function (Request $request) {
    // proses penyimpanan data, misalnya
    // dd($request->all());
    return back()->with('success', 'Data warga berhasil disimpan!');
})->name('warga.store');

Route::get('/Warga', function () {
    return view('Warga.index');
});

Route::get('/posko', function () {
    return view('posko.index');
});

Route::get('/mahasiswa', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

 Route::get('/about', function () {
    return view('halaman-about');
     });
Route::get('/kejadian',[KebencanaanController::class, 'index']);
Route::get('guest/auth',[AuthController::class,'index']);
Route::post('/guest/auth', [AuthController::class, 'login']);

Route::get('/posko', function () {
    return view('Guest.indexPosko');
});

Route::get('/warga', function () {
    return view('Guest.indexWarga');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // pastikan file resources/views/dashboard.blade.php ada
})->name('dashboard');

Route::post('/warga/store', function () {
    return 'Data warga berhasil dikirim!';
})->name('warga.store');

Route::get('/warga', function () {
    return view('Guest.indexwarga');
})->name('warga.index');
