<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\LoginController as AuthController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminController;

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

use App\Http\Controllers\Auth\RegisterController;

// Siswa register routes
Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);

// Siswa aspirasi routes
Route::middleware('web')->group(function () {
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::get('/aspirasi/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
});

// Admin routes
use App\Http\Controllers\AdminAuthController;
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin']);
Route::get('/admin/logout', [AdminAuthController::class, 'adminLogout']);
Route::middleware('web')->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('admin');
    Route::patch('/admin/{id_aspirasi}', [AdminController::class, 'updateStatus'])->name('admin.update');
});
