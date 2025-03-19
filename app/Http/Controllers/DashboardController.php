<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDosen = Dosen::count();
        $totalMahasiswa = Mahasiswa::count();
        $totalTugas = Tugas::count();

        return view('admin.home', compact('totalDosen', 'totalMahasiswa', 'totalTugas'));
    }
}
