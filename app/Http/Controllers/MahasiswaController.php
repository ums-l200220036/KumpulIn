<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mhs = Mahasiswa::all();
        return view('admin.tblmahasiswa', compact('mhs'));
    }

    public function destroy($nim)
    {
        $mhs = Mahasiswa::findOrFail($nim);
        $mhs->delete();
        return redirect()->route('view.mahasiswa')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }

    public function input(Request $request )
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'password_ms' => 'required|string|max:255',
        ]);
        // dd($request);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'semester' => $request->semester,
            'password_ms' => Hash::make($request->password_ms)
        ]);
        

        return redirect()->route('view.mahasiswa');       
    }
}
