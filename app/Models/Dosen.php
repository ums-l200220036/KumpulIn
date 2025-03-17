<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Dosen extends Authenticatable
{
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    protected $fillable = ['nidn', 'nama', 'password_ds'];
    protected $hidden = ['password_ds'];

    public function getAuthPassword()
    {
        return $this->password_ds;
    }
}
