<?php
namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PengumpulanController extends Controller
{
   public function input(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'file' => 'required|file|mimes:pdf,docx,xlsx,pptx,zip|max:10240'
        ]);

        // Debugging: Menampilkan request yang masuk
        // dd($request->all());

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama unik
            $validated['file'] = $file->storeAs('file_kumpul', $fileName, 'public');
        }

        $user = Auth::user();

        Pengumpulan::create([
            'mahasiswa_nim' => $user->nim,
            'file_url' => $validated['file']
        ]);

        return redirect()->route('mahasiswa.home')->with('success', 'Tugas berhasil dikumpulkan');
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
