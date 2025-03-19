<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function input(Request $request){
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:2048'
        ]);
        // simpan file
        if ($request->hasFile('file')){
            $validated['file'] = $request->file('file')->store('file', 'public');
        }
        // dd($request);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file'=> $validated['file']
        ]);

        return redirect()->route('home.dosen2')->with('success', 'Tugas berhasil ditambahkan.');
    }
}
