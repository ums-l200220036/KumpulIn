<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumpulanController extends Controller
{
    public function input(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:2048'
        ]);
        // simpan file

        $filePath = $request->file('file')->store('uploads', 'public');

        Pengumpulan::create([
            'file_url' => $filePath
        ]);


        return redirect()->route('mahasiswa.kumpultugas')->with('success', 'Tugas berhasil dikumpulkan');
    }

    public function index()
    {
        $kumpuls = Pengumpulan::all();
        return view('dosen.viewkumpul', compact('kumpuls'));
    }

    // Menampilkan file yang diupload
    public function view($id_pt)
    {
        $kumpul = Pengumpulan::findOrFail($id_pt);

        if (Storage::disk('public')->exists($kumpul->file_url)) {
            return response()->file(storage_path('app/public/' . $kumpul->file_url));
        }

        abort(404, 'File tidak ditemukan');
    }

}
