<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\GuestController as AdminGuestController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Staff\PengaduanController as StaffPengaduanController;
use App\Http\Controllers\Guest\GuestController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')  // <-- Ini penting!
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD KATEGORI
        Route::resource('categories', CategoryController::class);

        // CRUD STAFF
        Route::resource('staff', StaffController::class);

        // CRUD GUEST
        Route::resource('guest', AdminGuestController::class);

        // PENGADUAN
        Route::resource('pengaduan', AdminPengaduanController::class)
            ->only(['index', 'show', 'update']);

        // LAPORAN
        Route::get('laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');

        // PENGATURAN
        Route::get('pengaturan', [PengaturanController::class, 'index'])
            ->name('pengaturan.index');
        Route::post('pengaturan', [PengaturanController::class, 'update'])
            ->name('pengaturan.update');
    });

// STAFF
Route::middleware(['auth', 'staff'])
    ->prefix('staff')
    ->name('staff.')
    ->group(function () {

        // ✅ WAJIB PAKE CONTROLLER
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/pengaduan', [StaffPengaduanController::class, 'index'])
            ->name('pengaduan.index');

        Route::get('/pengaduan/{id}', [StaffPengaduanController::class, 'show'])
            ->name('pengaduan.show');

        Route::post('/pengaduan/{id}/balas', [StaffPengaduanController::class, 'balas'])
            ->name('pengaduan.balas');
    });

// GUEST
Route::get('/guest', [GuestController::class, 'index'])->name('guest.index');
Route::get('/pengaduan', [GuestController::class, 'create']);
Route::post('/pengaduan', [GuestController::class, 'store']);
Route::get('/cek', [GuestController::class, 'cek']);