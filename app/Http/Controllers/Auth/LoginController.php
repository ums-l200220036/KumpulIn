<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Gunakan satu tampilan login
    }

    // Proses login untuk semua role
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_id' => 'required', 
            'password' => 'required',
        ]);

        // Logout dari semua sesi sebelumnya
        Auth::logout();

        // Coba login sebagai Admin
        if (Auth::guard('admin')->attempt(['id_admin' => $request->user_id, 'password' => $request->password])) {
            Auth::guard('admin')->login(Auth::guard('admin')->user()); 
            return redirect()->route('admin.home');
        }

        // Coba login sebagai Dosen
        if (Auth::guard('dosen')->attempt(['nidn' => $request->user_id, 'password' => $request->password])) {
            Auth::guard('dosen')->login(Auth::guard('dosen')->user());
            return redirect()->route('dosen.home');
        }

        // Coba login sebagai Mahasiswa
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->user_id, 'password' => $request->password])) {
            Auth::guard('mahasiswa')->login(Auth::guard('mahasiswa')->user());
            return redirect()->route('mahasiswa.home');
        }

        return back()->withErrors(['user_id' => 'ID atau password salah']);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}