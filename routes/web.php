<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Staff\PengaduanController;


Route::get('/', function () {
    return redirect('/login');
});

// AUTH
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/logout', [AuthController::class, 'logout']);

// ADMIN
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // CRUD KATEGORI
        Route::resource('categories', CategoryController::class);
        Route::resource('staff', StaffController::class);
    });

Route::middleware(['auth', 'staff'])->prefix('staff')->group(function () {

    // dashboard TANPA controller
    Route::view('/dashboard', 'staff.dashboard');

    // pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show']);
    Route::post('/pengaduan/{id}/balas', [PengaduanController::class, 'balas']);

});
