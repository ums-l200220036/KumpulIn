<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DosenController extends Controller
{
    
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.tbldosen', compact('dosen'));
    }
    
    public function input(Request $request )
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'password_ds' => 'required|string|max:255',
        ]);
        // dd($request);
        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'mata_kuliah' => $request->mata_kuliah,
            'password_ds' => Hash::make($request->password_ds)
        ]);

        return redirect()->route('view.dosen');
    }

    // Method untuk mengupdate data
    public function update(Request $request)
    {
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'nidn' => 'required|string|max:20',
        'mata_kuliah' => 'required|string|max:255',
    ]);

    // Temukan data dosen berdasarkan NIDN
    $dosen = Dosen::where('nidn', $request->nidn)->first();

    if ($dosen) {
        // Update data
        $dosen->update([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'mata_kuliah' => $request->mata_kuliah,
        ]);

        return redirect()->back()->with('success', 'Data dosen berhasil diupdate!');
    } else {
        return redirect()->back()->with('error', 'Dosen tidak ditemukan!');
    }
}
}
