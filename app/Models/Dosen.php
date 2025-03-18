<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Dosen extends Authenticatable
{
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nidn', 'nama', 'mata_kuliah','password_ds'];
    protected $hidden = ['password_ds'];

    public function getAuthPassword()
    {
        return $this->password_ds;
    }
}
