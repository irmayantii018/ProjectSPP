<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dasboard;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\dasboardkepala;
use App\Http\Controllers\ortu;

// ============================
// ✅ Autentikasi: Login & Register
// ============================
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisController::class, 'tampil_regis'])->name('regis');
Route::post('/register', [RegisController::class, 'kirim_data'])->name('register.proses');

// ============================
// ✅ Redirect setelah login
// ============================
Route::get('/', [Dasboard::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [Dasboard::class, 'index'])->middleware('auth');

// ============================
// ✅ Dashboard per Role
// ============================
// Route::get('/dasboardortu', [ortu::class, 'index'])->name('dasboardortu')->middleware('auth');
Route::get('/dashboardortu', [ortu::class, 'index'])->name('dasboardortu')->middleware('auth');
Route::get('/dasboardkepala', [dasboardkepala::class, 'index'])->name('dasboardkepala')->middleware('auth');

Route::resource('siswa', SiswaController::class)->middleware('auth');

// ============================
// ✅ CRUD Siswa
// ============================
Route::resource('/siswa', SiswaController::class)->middleware('auth');

// ============================
// ✅ Pembayaran
// ============================
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index')->middleware('auth');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store')->middleware('auth');
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show')->middleware('auth');

// ============================
// ✅ Laporan
// ============================
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware('auth');
Route::post('/laporan', [LaporanController::class, 'filter'])->name('laporan.filter')->middleware('auth');


Route::get('/dasboardkepala', [dasboardKepala::class, 'index'])
    ->name('dasboardkpl') // ← Nama route harus ini
    ->middleware('auth');

// Route::get('/laporan', [LaporanController::class, 'index']);
