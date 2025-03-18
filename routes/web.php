<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DosenController;

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

Route::get('tabeldosen', function(){
    return view('admin.tbldosen');
});

Route::get('tabelmahasiswa', function(){
    return view('admin.tblmahasiswa');
});

Route::get('adddosen', function(){
    return view('admin.adddosen');
});

Route::get('home', function(){
    return view('admin.home');
})->name('home.all');

Route::post('/inputdosen', [DosenController::class, 'input'])->name('input.dosen');
Route::get('/tbldosen', [DosenController::class, 'index'])->name('view.dosen');
