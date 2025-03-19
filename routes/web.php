<?php
use App\Http\Controllers\PengumpulanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Auth;


Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

// Proses Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Middleware Role-based Dashboard (proteksi akses sesuai role)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.home');
    })->name('admin.home');

    //Dosen
    Route::get('/adddosen', [DosenController::class, 'index'])->name('form.dosen');
    Route::get('/tbldosen', [DosenController::class, 'view'])->name('view.dosen');
    Route::post('/inputdosen', [DosenController::class, 'input'])->name('input.dosen');
    Route::delete('/dosen/destroy/{nidn}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    Route::put('/dosen/{nidn}', [DosenController::class, 'update'])->name('dosen.update');
    
    //Mahasiswa
    Route::get('/addmahasiswa', [MahasiswaController::class, 'index'])->name('form.mhs');
    Route::post('/inputmahasiswa', [MahasiswaController::class, 'input'])->name('input.mahasiswa');
    Route::get('/tblmahasiswa', [MahasiswaController::class, 'view'])->name('view.mahasiswa');
    Route::delete('/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
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

// Dosen
Route::get('homedosen', function(){
    return view('dosen.home');
})->name('home.dosen2');

Route::get('addtugas', function(){
    return view('dosen.addtugas');
})->name('add.tugas');

Route::post('/inputtugas', [TugasController::class, 'input'])->name('dosen.addtugas');

Route::get('homemhs', function(){
    return view('mahasiswa.home');
});

Route::get('kumpultugas', function(){
    return view('mahasiswa.kumpultugas');
})->name('mahasiswa.kumpultugas');

Route::post('/kumpultugas', [PengumpulanController::class, 'input'])->name('mahasiswa.kumpul');

Route::get('viewkumpul', function(){
    return view('dosen.viewkumpul');
})->name('view.kumpul');