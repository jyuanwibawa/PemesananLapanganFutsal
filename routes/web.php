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
Route::post('/register', [PenggunaController::class, 'register'])->name('register.submit');

// Halaman Login
Route::get('/login', [PenggunaController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

// ================== User Routes ==================

Route::middleware('auth:pengguna')->group(function () {
    // Dashboard Pengguna
    Route::get('/pengguna/dashboard', [PenggunaController::class, 'penggunaDashboard'])->name('pengguna.dashboard');

    // Riwayat Pemesanan
    Route::get('/booking-history', [PenggunaController::class, 'showBookingHistory'])->name('pemesanan.index');

    // Route untuk membuat pemesanan lapangan
    Route::post('/create-booking', [PenggunaController::class, 'createBooking'])->name('create.booking');

    // Route untuk konfirmasi pembayaran
    Route::post('/pembayaran', [PenggunaController::class, 'createPembayaran'])->name('create.pembayaran');
});

// ================== Admin Panel Routes ==================

Route::prefix('admin')->name('admin.')->middleware('auth:pengguna')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [PenggunaController::class, 'adminDashboard'])->name('dashboard');

    // CRUD Lapangan
    Route::resource('lapangan', LapanganController::class)->names('lapangan');

    // Riwayat Booking
    Route::get('/booking/riwayat', [BookingController::class, 'riwayat'])->name('booking.history');

    // CRUD Fasilitas
    Route::resource('fasilitas', FasilitasController::class)->names('fasilitas');

    // CRUD Pembayaran
    Route::resource('pembayaran', PembayaranController::class)->names('pembayaran');
});

// ================== Additional Routes ==================

// Rute untuk mengatur pengaturan (misalnya, mengatur profil pengguna)
// Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');

// Rute untuk mendapatkan data lapangan berdasarkan ID (jika diperlukan)
Route::get('/lapangan/{id}', [LapanganController::class, 'show'])->name('lapangan.show');
