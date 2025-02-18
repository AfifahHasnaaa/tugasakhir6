<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnimodel extends Model
{
    use HasFactory;

    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    // protected $dates = 'tanggal_lahir';
    public $timestamps = false;

    protected $fillable = [
        'id_user_admin',
        'id_user_alumni',
        'nama_alumni',
        'nisn',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'agama',
        'status',
        'alasan',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat',
        'provinsi_domisili',
        'kabupaten_domisili',
        'kecamatan_domisili',
        'kelurahan_domisili',
        'alamat_domisili',
        'tahun_masuk',
        'tahun_lulus',
        'jurusan',
        'perguruan_tinggi',
        'prodi',
        'nama_perusahaan',
        'bidang_pekerjaan',
        'jabatan',
        'penghasilan',
        'alamat_instansi',
        'no_telepon',
        'no_telepon_alternatif',
        'email',
        'keterangan',
        'tanggal_up_data'
    ];
    public function getJenisKelaminTextAttribute()
    {
        $jenisKelaminMap = [
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
        ];
        return $jenisKelaminMap[$this->gender] ?? 'Tidak Diketahui';
    }
    // protected $casts = [
    //     'tanggal_lahir' => 'date',
    //     'tanggal_up_data' => 'date',
    // ];
}
