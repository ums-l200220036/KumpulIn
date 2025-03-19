<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
<<<<<<< HEAD
    protected $table = 'pengumpulan';
    protected $primaryKey = 'id_pt';
    protected $fillable = ['file_url'];
}
=======
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
>>>>>>> 80a44f5faea8f66163c2cf97557fb65bb115431d
