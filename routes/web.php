<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Halaman Login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Proses Login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Proses Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Middleware Role-based Dashboard
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.home');
    })->name('admin.home');
});

Route::middleware(['auth:dosen'])->group(function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.home');
    })->name('dosen.home');
});

Route::middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.home');
    })->name('mahasiswa.home');
});

Route::get('tbldosen', function(){
    return view('admin.tbldosen');
});