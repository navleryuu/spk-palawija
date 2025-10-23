<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
});

// 🟢 Satu halaman login, pakai query ?role=admin / ?role=kepala_dinas
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// dashboard dummy dulu untuk test
Route::get('/admin/dashboard', fn() => 'Halo, ini dashboard admin')->name('admin.dashboard');
Route::get('/kepala/dashboard', fn() => 'Halo, ini dashboard kepala dinas')->name('kepala.dashboard');
