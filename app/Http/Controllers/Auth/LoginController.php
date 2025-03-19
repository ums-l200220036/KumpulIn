<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Gunakan satu tampilan login
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_id' => 'required', 
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['id_admin' => $request->user_id, 'password' => $request->password])) {
            $admin = Admin::where('id_admin', $request->user_id)->first();
            $this->setSession($admin, 'admin');
            return redirect()->route('admin.home');
        }

        // Coba login sebagai Dosen
        if (Auth::guard('dosen')->attempt(['nidn' => $request->user_id, 'password' => $request->password])) {
            $dosen = Dosen::where('nidn', $request->user_id)->first();
            $this->setSession($dosen, 'dosen');
            return redirect()->route('dosen.home');
        }

        // Coba login sebagai Mahasiswa
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->user_id, 'password' => $request->password])) {
            $mahasiswa = Mahasiswa::where('nim', $request->user_id)->first();
            $this->setSession($mahasiswa, 'mahasiswa');
            return redirect()->route('mahasiswa.home');
        }

        return back()->withErrors(['user_id' => 'ID atau password salah']);
    }

    private function setSession($user, $role)
    {
        session([
            'user_id'    => $user->id ?? $user->id_admin ?? $user->nim ?? $user->nidn, // ID unik user
            'user_name'  => $user->nama,  // Menyimpan nama user
            'user_type'  => $role,        // Menyimpan tipe pengguna (admin, mahasiswa, dosen)
            'user_info'  => $role === 'mahasiswa' ? "Semester: " . $user->semester :
                        ($role === 'dosen' ? "Mata Kuliah: " . $user->mata_kuliah : ''),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('dosen')->logout();
        Auth::guard('mahasiswa')->logout();
        Auth::logout();

        Session::flush();

        return redirect()->route('login');
    }
}