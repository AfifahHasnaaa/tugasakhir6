<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAlumniModel extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'user_alumni';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'username', 'email', 'password', 'tanggal_buat', 'tanggal_login', 'reset_code', 'reset_code_expiry'
    ];
   
    protected $casts = [
        'tanggal_buat' => 'datetime',
        'tanggal_login' => 'datetime',
        'reset_code_expiry' => 'datetime',
    ];
    
}