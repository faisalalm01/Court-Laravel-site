<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\PegawaiController;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\User\ApproveCutiController;
use App\Http\Controllers\Dashboard\User\DataCutiController;
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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');

// auth
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// dashboard user approve cuti
Route::get('/dashboard/user/approve-cuti', [ApproveCutiController::class, 'index'])->name('dashboard.user.daftar-approve-cuti')->middleware('auth');
Route::get('/dashboard/user/approve-update-cuti/{cutiId}', [ApproveCutiController::class, 'showUpdateCutiApprove'])->name('dashboard.user.approve-update-cuti')->middleware('auth');

// dashboard user pengajuan cuti
Route::get('/dashboard/user/pengajuan-cuti', [PengajuanCutiController::class, 'showTambahPengajuanCuti'])->name('dashboard.user.pengajuan-cuti')->middleware('auth');
Route::get('/dashboard/user/menunggu-approval-cuti', [PengajuanCutiController::class, 'showDaftarApproval'])->name('dashboard.user.daftar-approval')->middleware('auth');
Route::post('/dashboard/user/tambah-pengajuan-cuti', [PengajuanCutiController::class, 'tambahPengajuanCuti'])->name('dashboard.user.tambah.pengajuan-cuti')->middleware('auth');

// dashboard user pengajuan cuti
Route::get('/dashboard/user/data-cuti-disetujui', [DataCutiController::class, 'showDataCutiDisetujui'])->name('dashboard.user.data.cuti.disetujui')->middleware('auth');
Route::get('/dashboard/user/data-cuti-ditangguhkan', [DataCutiController::class, 'showDataCutiDitangguhkan'])->name('dashboard.user.data.cuti.ditangguhkan')->middleware('auth');
Route::get('/dashboard/user/data-cuti-perubahan', [DataCutiController::class, 'showDataCutiPerubahan'])->name('dashboard.user.data.cuti.perubahan')->middleware('auth');
Route::get('/dashboard/user/data-cuti-tidak-disetujui', [DataCutiController::class, 'showDataCutiTidakDisetujui'])->name('dashboard.user.data.cuti.tidak.disetujui')->middleware('auth');


// dashboard user history
Route::get('/dashboard/user/daftar-cuti', [HistoryController::class, 'showDaftarCuti'])->name('dashboard.user.daftar-cuti')->middleware('auth');
Route::get('/dashboard/user/daftar-kgb', [HistoryController::class, 'showDaftarKGB'])->name('dashboard.user.daftar-kgb')->middleware('auth');
Route::get('/dashboard/user/daftar-knp', [HistoryController::class, 'showDaftarKNP'])->name('dashboard.user.daftar-knp')->middleware('auth');

// dashboard admin data users
Route::get('/dashboard/admin/data-users', [UserController::class, 'index'])->name('dashboard.admin.data-users')->middleware('auth');
Route::post('/dashboard/admin/add-users', [UserController::class, 'addUser'])->name('dashboard.admin.add-users')->middleware('auth');
Route::put('/dashboard/admin/edit-users/{nip}', [UserController::class, 'editUser'])
    ->name('dashboard.admin.edit-users')
    ->middleware('auth');

// dashboard admin data pegawai
Route::get('/dashboard/admin/data-pegawai', [PegawaiController::class, 'index'])->name('dashboard.admin.data-pegawai')->middleware('auth');
