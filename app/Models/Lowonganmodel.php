<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowonganmodel extends Model
{
    use HasFactory;

    protected $table = 'lowongan';
    protected $primaryKey = 'id_lowongan';
    public $timestamps = false;

    protected $fillable = [
    	'id_user_admin', 'nama_instansi', 'deskripsi', 'posisi', 'syarat_pengalaman', 'gender','gaji', 'provinsi', 'kabupaten', 'kecamatan','kelurahan', 'syarat_pekerjaan', 'alamat', 'deskripsi_pekerjaan', 'no_kontak', 'email', 'logo','tanggal_up_lowongan'
    ];
}