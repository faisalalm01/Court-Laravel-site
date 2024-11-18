<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\User\HistoryController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');

// auth
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// dashboard user history
Route::get('/dashboard/user/daftar-cuti', [HistoryController::class, 'showDaftarCuti'])->name('dashboard.user.daftar-cuti')->middleware('auth');
Route::get('/dashboard/user/daftar-kgb', [HistoryController::class, 'showDaftarKGB'])->name('dashboard.user.daftar-kgb')->middleware('auth');
Route::get('/dashboard/user/daftar-knp', [HistoryController::class, 'showDaftarKNP'])->name('dashboard.user.daftar-knp')->middleware('auth');
