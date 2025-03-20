<?php
use App\Http\Controllers\PengumpulanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;



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
    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.home');

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
    Route::get('/dosen/dashboard', [TugasController::class, 'homeDosen'])->name('dosen.home');
    Route::post('/inputtugas', [TugasController::class, 'input'])->name('dosen.addtugas');
    Route::get('/dosen/viewkumpul', [PengumpulanController::class, 'index'])->name('kumpul.index');
    Route::get('/dosen/viewkumpul/{id_pt}', [PengumpulanController::class, 'view'])->name('kumpul.view');
    Route::get('addtugas', function(){
         return view('dosen.addtugas');
    })->name('add.tugas');
});

Route::middleware(['auth:mahasiswa'])->group(function () {
    // Dashboard Mahasiswa
    Route::get('/mahasiswa/dashboard', [TugasController::class, 'homeMahasiswa'])->name('mahasiswa.home');

    // Halaman untuk kumpul tugas
    Route::get('/tugas/{id_tugas}/kumpul', [TugasController::class, 'kumpulTugas'])->name('tugas.kumpul');

    // Proses submit tugas
    Route::post('tugas/kumpul', [PengumpulanController::class, 'input'])->name('mahasiswa.kumpul');

});


