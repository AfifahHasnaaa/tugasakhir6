<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'namapengguna',
        'email',
        'sandi',
        'role',
        'tanggal_buat',
        'terakhir_login',
    ];

    protected $hidden = [
        'sandi',
    ];

    public $timestamps = false;
}
