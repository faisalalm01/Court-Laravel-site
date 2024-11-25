<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\User\HistoryController;
use App\Http\Controllers\Dashboard\User\PengajuanCutiController;
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
// dashboard user pengajuan cuti
Route::get('/dashboard/user/pengajuan-cuti', [PengajuanCutiController::class, 'showTambahPengajuanCuti'])->name('dashboard.user.pengajuan-cuti')->middleware('auth');
Route::get('/dashboard/user/menunggu-approval-cuti', [PengajuanCutiController::class, 'showDaftarApproval'])->name('dashboard.user.daftar-approval')->middleware('auth');
Route::post('/dashboard/user/tambah-pengajuan-cuti', [PengajuanCutiController::class, 'tambahPengajuanCuti'])->name('dashboard.user.tambah.pengajuan-cuti')->middleware('auth');

// dashboard user history
Route::get('/dashboard/user/daftar-cuti', [HistoryController::class, 'showDaftarCuti'])->name('dashboard.user.daftar-cuti')->middleware('auth');
Route::get('/dashboard/user/daftar-kgb', [HistoryController::class, 'showDaftarKGB'])->name('dashboard.user.daftar-kgb')->middleware('auth');
Route::get('/dashboard/user/daftar-knp', [HistoryController::class, 'showDaftarKNP'])->name('dashboard.user.daftar-knp')->middleware('auth');
