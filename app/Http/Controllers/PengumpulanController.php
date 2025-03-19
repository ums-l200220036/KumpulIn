<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    public function input(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:2048'
        ]);
        // simpan file
        if ($request->hasFile('file')){
            $validated['file'] = $request->file('file')->store('file_kumpul', 'public');
        }
        Pengumpulan::create([
            'file_url'=> $validated['file']
        ]);

        return redirect()->route('mahasiswa.kumpultugas')->with('success', 'Tugas berhasil dikumpulkan');
    }
}
