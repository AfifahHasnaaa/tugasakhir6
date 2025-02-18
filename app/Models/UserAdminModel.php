<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdminModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_admin';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
    	'username', 'email', 'password','tanggal_buat','tanggal_login'
    ];
    protected $casts = [
        'tanggal_buat' => 'datetime',
        'tanggal_login' => 'datetime',
    ];
}