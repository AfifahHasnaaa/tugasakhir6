<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class PrestasiModel extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';
    protected $fillable = [
        'id_user_admin','nama','tahun_lulus','keterangan','tempat','posisi','prestasi','foto',
    ];
    // public function userAdmin()
    // {
    //     return $this->belongsTo(User::class, 'id_user_admin');
    // }

    public function getKeteranganTextAttribute()
    {
        $keteranganMap = [
            1 => 'Karyawan',
            2 => 'Pengusaha',
            3 => 'Lanjut Pendidikan',
        ];

        return $keteranganMap[$this->keterangan] ?? 'Tidak Diketahui';
    }
}
// return view('profile/prestasi');
