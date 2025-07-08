<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\ProfileController; // <-- 1. TAMBAHKAN USE STATEMENT INI

/*
|--------------------------------------------------------------------------
| Public Routes (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Media Public (dengan filter dan search)
Route::get('/media', [MediaController::class, 'index'])->name('media.index');
Route::get('/media/{medium}', [MediaController::class, 'show'])->name('media.show');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

// Login routes (bisa diakses jika belum login)
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Harus login dulu)
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // 2. TAMBAHKAN ROUTE PROFIL DI SINI
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // CRUD Prodi
    Route::resource('/prodi', ProdiController::class);
    
    // CRUD Kategori  
    Route::resource('/kategori', KategoriController::class);
    
    // CRUD Mahasiswa
    Route::resource('/mahasiswa', MahasiswaController::class);
    
    // CRUD Media
    Route::resource('/media', AdminMediaController::class);
});