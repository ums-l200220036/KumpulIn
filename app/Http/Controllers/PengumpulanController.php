<?php
namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 80a44f5faea8f66163c2cf97557fb65bb115431d

class PengumpulanController extends Controller
{
    public function input(Request $request, $id_tugas) // Tambahkan $id
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 80a44f5faea8f66163c2cf97557fb65bb115431d
