<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdminModel extends Authenticatable
{
    protected $table = 'user_admin';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
    	'username', 'email', 'password','tanggal_buat','tanggal_login'
    ];
}