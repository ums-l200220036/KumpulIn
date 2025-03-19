<?php
namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanController extends Controller
{
    public function input(Request $request, $id_tugas) // Tambahkan $id
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:pdf,docx,xlsx,pptx,zip|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('file_kumpul', 'public');
        }

        $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();

        if (!$mahasiswa) {
            return redirect()->route('tugas.kumpul', ['id_tugas' => $id_tugas])->with('error', 'Mahasiswa tidak ditemukan');
        }

        Pengumpulan::create([
            'id_tugas' => $id_tugas,
            'mahasiswa_nim' => $mahasiswa->nim,
            'file_url' => $validated['file']
        ]);

        return redirect()->route('tugas.kumpul', ['id_tugas' => $id_tugas])->with('success', 'Tugas berhasil dikumpulkan');
    }

    // Fungsi untuk menampilkan tugas mahasiswa berdasarkan NIM yang login
    public function tugasByNIM()
    {
        $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();
        
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.kumpultugas')->with('error', 'Mahasiswa tidak ditemukan');
        }

        $pengumpulan = Pengumpulan::where('mahasiswa_nim', $mahasiswa->nim)->get();

        return view('tugas-terkumpul', compact('pengumpulan'));
    }

    // Fungsi untuk admin melihat semua tugas yang dikumpulkan mahasiswa
    public function semuaTugas()
    {
        $pengumpulan = Pengumpulan::with('mahasiswa')->get();

        return view('semua-tugas', compact('pengumpulan'));
    }
}