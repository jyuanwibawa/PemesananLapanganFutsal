<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

// Halaman Register
Route::get('/register', [PenggunaController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PenggunaController::class, 'register']);

// Halaman Login
Route::get('/login', [PenggunaController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);

// Logout
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

// Dashboard Admin (cek role manual di controller)
Route::get('/admin/dashboard', [PenggunaController::class, 'adminDashboard'])->name('admin.dashboard');

// Dashboard Pengguna (cek role manual di controller)
Route::get('/pengguna/dashboard', [PenggunaController::class, 'penggunaDashboard'])->name('pengguna.dashboard');
