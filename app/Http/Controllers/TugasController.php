<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function input(Request $request){
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'semester' => 'required|integer',
            'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:2048'
        ]);
        // simpan file
        if ($request->hasFile('file')){
            $validated['file'] = $request->file('file')->store('file_tugas', 'public');
        }
        // dd($request);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'semester' => $validated['semester'],
            'file'=> $validated['file']
        ]);

        return redirect()->route('dosen.home')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function homeDosen() {
        $tugas = Tugas::orderBy('created_at', 'desc')->get(); // Ambil semua tugas, diurutkan dari terbaru
        return view('dosen.home', compact('tugas')); // Kirim data tugas ke view
    }

    public function homeMahasiswa() {
        $mahasiswa = Auth::guard('mahasiswa')->user();
    
        if (!$mahasiswa) {
            return redirect()->route('login')->with('error', 'Mahasiswa tidak ditemukan.');
        }
    
        // Ambil tugas berdasarkan semester mahasiswa
        $tugas = Tugas::where('semester', $mahasiswa->semester)
                      ->orderBy('created_at', 'desc')
                      ->get();
    
        // Kirim ke view mahasiswa.home
        return view('mahasiswa.home', compact('tugas'));
    }

    public function kumpulTugas($id_tugas)
    {
        $tugas = Tugas::where('id_tugas', $id_tugas)->firstOrFail();
        return view('mahasiswa.kumpultugas', compact('tugas'));
    }
    
    
}
