<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;


// Halaman Login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Proses Login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Proses Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

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

Route::get('adddosen', function(){
    return view('admin.adddosen');
});

Route::get('addmahasiswa', function(){
    return view('admin.addmahasiswa');
});

Route::get('home', function(){
    return view('admin.home');
})->name('home.all');

Route::get('/adddosen', [DosenController::class, 'index'])->name('form.dosen');
Route::get('/tbldosen', [DosenController::class, 'view'])->name('view.dosen');
Route::post('/inputdosen', [DosenController::class, 'input'])->name('input.dosen');
Route::delete('/dosen/destroy/{nidn}', [DosenController::class, 'destroy'])->name('dosen.destroy');
Route::put('/dosen/{nidn}', [DosenController::class, 'update'])->name('dosen.update');

Route::get('/addmahasiswa', [MahasiswaController::class, 'index'])->name('form.mhs');
Route::post('/inputmahasiswa', [MahasiswaController::class, 'input'])->name('input.mahasiswa');
Route::get('/tblmahasiswa', [MahasiswaController::class, 'view'])->name('view.mahasiswa');
Route::delete('/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');


// Dosen
Route::get('homedosen', function(){
    return view('dosen.home');
});

Route::get('addtugas', function(){
    return view('dosen.addtugas');
});