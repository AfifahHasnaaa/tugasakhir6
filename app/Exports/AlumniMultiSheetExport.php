<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AlumniMultiSheetExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];


        $sheets[] = new AlumniExport();

        $jurusanList = ['Akuntansi', 'Layanan Perbankan Syariah', 'Manajemen Perkantoran', 'Bisnis Ritel','Bisnis Digital','Desain Komunikasi Visual','Rekayasa Perangkat Lunak','Teknik Komputer Jaringan'];
        foreach ($jurusanList as $jurusan) {
            $sheets[] = new AlumniPerJurusanExport($jurusan); 
        }

        return $sheets;
    }
}
