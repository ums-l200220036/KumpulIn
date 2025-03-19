<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';
    protected $primaryKey = 'id_pt';
    use HasFactory;

    protected $fillable = [
        'id_pt',
        'id_tugas',        // Foreign Key ke tabel tugas
        'mahasiswa_nim',   // Foreign Key ke tabel mahasiswa
        'file_url'
    ];

    // Relasi ke Tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }
}
