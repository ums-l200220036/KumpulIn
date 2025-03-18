<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama', 'semester', 'password_ms'];
    protected $hidden = ['password_ms'];

    public function getAuthPassword()
    {
        return $this->password_ms;
    }
}
