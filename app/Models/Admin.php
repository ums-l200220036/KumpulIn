<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['id_admin', 'nama', 'password'];
    protected $hidden = ['password'];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
