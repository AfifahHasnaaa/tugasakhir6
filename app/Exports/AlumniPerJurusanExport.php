<?php

namespace App\Exports;

use App\Models\Alumnimodel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class AlumniPerJurusanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $jurusan;

    public function __construct($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    public function collection()
    {
        return Alumnimodel::where('jurusan', $this->jurusan)->get();
    }



    public function map($row): array
    {
        return [
            strtoupper($row->nama_alumni),
            $row->nisn,
            $row->nis,
            $row->tempat_lahir,
            $this->formatTanggal($row->tanggal_lahir),
            $row->gender,
            $row->agama,
            $row->status,
            $row->alasan,
            $row->provinsi,
            $row->kabupaten,
            $row->kecamatan,
            $row->kelurahan,
            $row->alamat,
            $row->provinsi_domisili,
            $row->kabupaten_domisili,
            $row->kecamatan_domisili,
            $row->kelurahan_domisili,
            $row->alamat_domisili,
            $row->tahun_masuk,
            $row->tahun_lulus,
            $row->jurusan,
            $row->perguruan_tinggi,
            $row->prodi,
            $row->nama_perusahaan,
            $row->bidang_pekerjaan,
            $row->jabatan,
            $this->formatRupiah($row->penghasilan),
            $row->alamat_instansi,
            $row->no_telepon,
            $row->no_telepon_alternatif,
            $row->email,
            $this->formatTanggalUpData($row->tanggal_up_data),
            $row->keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            ['Data Alumni Jurusan ' . $this->jurusan],
            [
                'Nama',
                'NISN',
                'NIS',
                'Tempat Lahir',
                'Tanggal Lahir',
                'Gender',
                'Agama',
                'Status',
                'Alasan',
                'Provinsi',
                'Kabupaten',
                'Kecamatan',
                'Kelurahan',
                'Alamat',
                'Provinsi Domisili',
                'Kabupaten Domisili',
                'Kecamatan Domisili',
                'Kelurahan Domisili',
                'Alamat Domisili',
                'Tahun Masuk',
                'Tahun Lulus',
                'Jurusan SMK',
                'Universitas',
                'Prodi',
                'Nama Perusahaan',
                'Bidang Pekerjaan',
                'Jabatan',
                'Penghasilan',
                'Alamat Instansi',
                'No Telepon',
                'No Telepon Alternatif',
                'Email',
                'Tanggal Upload Data',
                'Keterangan'
            ]
        ];
    }

    private function formatRupiah($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }

    private function formatTanggal($tanggal)
    {
        return Carbon::parse($tanggal)->translatedFormat('d F Y');
    }

    private function formatTanggalUpData($tanggalUpData)
    {
        return Carbon::parse($tanggalUpData)->translatedFormat('d-m-Y');
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        // Mengatur style untuk semua sel
        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Auto-size kolom
        foreach (range('A', $highestColumn) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Gaya khusus untuk baris judul (baris 1)
        $sheet->mergeCells('A1:' . $highestColumn . '1');
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        // Gaya untuk heading (baris 2)
        $sheet->getStyle('A2:' . $highestColumn . '2')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
                'wrapText' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '5584B0',
                ],
            ],
        ]);

        // Membuat baris bergantian warna (striped)
        for ($row = 3; $row <= $highestRow; $row++) {
            if ($row % 2 == 0) {
                $sheet->getStyle("A{$row}:{$highestColumn}{$row}")->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'F2F2F2',
                        ],
                    ],
                ]);
            }
        }
    }

    public function title(): string
    {
        return $this->jurusan;
    }
}
