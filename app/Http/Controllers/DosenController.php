<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DosenController extends Controller
{
    
    public function index(){
        return view('admin.adddosen');
    }

    public function view()
    {
        $dosen = Dosen::all();
        return view('admin.tbldosen', compact('dosen'));
    }
    
    public function destroy($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();
        return redirect()->route('view.dosen')->with('success', 'Data Dosen berhasil dihapus.');
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



        return redirect()->route('view.dosen')->with('success', 'Data berhasil disimpan!');

       
    }
    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
        ]);

        $dosen = Dosen::where('nidn', $nidn)->firstOrFail();
        $dosen->update([
            'nama' => $request->nama,
            'mata_kuliah' => $request->mata_kuliah,
        ]);

        return redirect()->route('view.dosen')->with('success', 'Data berhasil disimpan!');
    }

}
