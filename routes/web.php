<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PerhitunganController;
use App\Http\Controllers\Admin\PerangkinganController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Kepala\DashboardController as KepalaDashboard;
use App\Http\Controllers\Kepala\PerhitunganController as KepalaPerhitungan;
use App\Http\Controllers\Kepala\LaporanController as KepalaLaporan;
use App\Http\Controllers\Kepala\PengaturanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Halaman Awal
Route::get('/', function () {
    return view('home');
});

// 🔐 Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

//reset pasword
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
    ->name('forgot.password');

Route::post('/forgot-password', [ForgotPasswordController::class, 'reset']);


// 🚪 Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// 🧩 Admin Area
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::resource('/kriteria', KriteriaController::class);
    Route::resource('alternatif', AlternatifController::class);
    Route::resource('perhitungan', PerhitunganController::class); 
    Route::resource('perangkingan', PerangkinganController::class); 
    
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

    Route::resource('/users', UserController::class)->names('admin.users');

    
});

// 🧩 Kepala Dinas Area
Route::prefix('kepala')->middleware(['auth', 'role:kepala_dinas'])->group(function () {
    Route::get('/dashboard', [KepalaDashboard::class, 'index'])->name('kepala.dashboard');
    Route::get('/perhitungan', [KepalaPerhitungan::class, 'index'])->name('kepala.perhitungan');
    Route::get('/laporan', [KepalaLaporan::class, 'index'])->name('kepala.laporan');
    Route::get('/kepala/laporan/cetak', [App\Http\Controllers\Kepala\LaporanController::class, 'cetak'])
    ->name('kepala.laporan.cetak');
    Route::get('/pengaturan', [PengaturanController::class, 'index'])
            ->name('kepala.pengaturan');

        Route::post('/pengaturan', [PengaturanController::class, 'update'])
            ->name('kepala.pengaturan.update');

});