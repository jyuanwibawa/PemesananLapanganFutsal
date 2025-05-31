<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Admin\LapanganController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\PembayaranController;

// ================== Auth Routes ==================

// Halaman Register
Route::get('/register', [PenggunaController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PenggunaController::class, 'register']);

// Halaman Login
Route::get('/login', [PenggunaController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);

// Logout
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

// ================== Dashboard Routes ==================

// Dashboard Admin
Route::get('/admin/dashboard', [PenggunaController::class, 'adminDashboard'])->name('admin.dashboard');

// Dashboard Pengguna
Route::get('/pengguna/dashboard', [PenggunaController::class, 'penggunaDashboard'])->name('pengguna.dashboard');

// ================== Admin Panel Routes ==================

Route::prefix('admin')->name('admin.')->group(function () {
    // CRUD Lapangan
    Route::resource('lapangan', LapanganController::class)->names('lapangan');

    // Riwayat Booking
    Route::get('/booking/riwayat', [BookingController::class, 'riwayat'])->name('booking.history');

    // CRUD Fasilitas
    Route::resource('fasilitas', FasilitasController::class)->names('fasilitas');

    // CRUD Pembayaran
    Route::resource('pembayaran', PembayaranController::class)->names('pembayaran');
});
