<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoskoBencanaController;
use App\Http\Controllers\KejadianBencanaController;
use App\Http\Controllers\DistribusiLogistikController;
use App\Http\Controllers\Guest\TentangController;
use App\Http\Controllers\Guest\KebencanaanController;
use App\Http\Controllers\LogistikBencanaController;

/*
|--------------------------------------------------------------------------
| Guest / Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.main.dashboard');
});

Route::get('/kejadian', [KebencanaanController::class, 'index']);
Route::resource('tentang', TentangController::class)->only(['index']);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::resource('login', LoginController::class)->only(['index', 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('checkislogin');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['checkislogin'])->group(function () {

 Route::resource('warga', \App\Http\Controllers\WargaController::class);
    Route::resource('posko', PoskoBencanaController::class);
    Route::resource('kejadian', KejadianBencanaController::class);
    Route::resource('donasi', DonasiController::class);

    // Distribusi Logistik
   Route::resource('distribusi', DistribusiLogistikController::class);
});

/*
|--------------------------------------------------------------------------
| Admin Only
|--------------------------------------------------------------------------
*/

Route::middleware(['checkrole:admin'])->group(function () {
    Route::resource('user', UserController::class);
});

Route::resource('logistik', LogistikBencanaController::class);
Route::resource('distribusi-logistik', DistribusiLogistikController::class);
