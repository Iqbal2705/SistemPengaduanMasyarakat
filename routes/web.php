<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Staff\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\GuestController;

Route::get('/', function () {
    return redirect('/login');
});

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')  // <-- Ini penting!
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD KATEGORI
        Route::resource('categories', CategoryController::class);

        // CRUD STAFF
        Route::resource('staff', StaffController::class);
    });

// STAFF
Route::middleware(['auth', 'staff'])
    ->prefix('staff')
    ->name('staff.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('staff.dashboard');
        })->name('dashboard');

        // LIHAT PENGADUAN
        Route::get('/pengaduan', [PengaduanController::class, 'index'])
            ->name('pengaduan.index');

        Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])
            ->name('pengaduan.show');

        // BALAS PENGADUAN
        Route::post('/pengaduan/{id}/balas', [PengaduanController::class, 'balas'])
            ->name('pengaduan.balas');
    });

Route::get('/', [GuestController::class, 'index']);
Route::get('/pengaduan', [GuestController::class, 'create']);
Route::post('/pengaduan', [GuestController::class, 'store']);
Route::get('/cek', [GuestController::class, 'cek']);
