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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\XampleController;

Route::get('/login', [XampleController::class, 'showLoginForm'])->name('login');
Route::post('/login', [XampleController::class, 'login']);
Route::get('/logout', [XampleController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('admin/index', function () {
        return view('admin.index');
    });
    Route::get('user/index', function () {
        return view('user.index');
    });
});

Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/user/index', [XampleController::class, 'index'])->name('user.dashboard');
});
