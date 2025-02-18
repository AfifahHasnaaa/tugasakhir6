<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowonganmodel;
use App\Models\PrestasiModel;
use App\Models\AlumniModel;

class StatistikController extends Controller
{
    public function index()
    {
        $prestasi = PrestasiModel::all();
        $lowongan = Lowonganmodel::orderBy('tanggal_up_lowongan', 'desc')
            ->limit(4)
            ->get();
        $alumni = AlumniModel::all();
        $totalAlumni = AlumniModel::count();
        $totalLakiLaki = AlumniModel::where('gender', 'L')->count();
        $totalPerempuan = AlumniModel::where('gender', 'P')->count();
        $totalBekerja = AlumniModel::where('status', 'Bekerja')->count();
        $totalKuliah = AlumniModel::where('status', 'Pendidikan Lanjut')->count();
        $totalWirausaha = AlumniModel::where('status', 'Wirausaha')->count();
        $totalBelumBekerja = AlumniModel::where('status', 'Belum Bekerja')->count();
        $totalTidakBekerja = AlumniModel::where('status', 'Tidak Bekerja')->count();

        return view('guest/beranda', compact('prestasi', 'lowongan', 'alumni', 'totalAlumni', 'totalLakiLaki', 'totalPerempuan', 'totalBekerja', 'totalKuliah', 'totalWirausaha', 'totalBelumBekerja', 'totalTidakBekerja'));
    }
    public function fitur()
    {
        $prestasi = PrestasiModel::all();
        $lowongan = LowonganModel::all();
        $alumni = AlumniModel::all();
        $totalAlumni = AlumniModel::count();
        $totalLakiLaki = AlumniModel::where('gender', 'L')->count();
        $totalPerempuan = AlumniModel::where('gender', 'P')->count();
        $totalBekerja = AlumniModel::where('status', 'Bekerja')->count();
        $totalKuliah = AlumniModel::where('status', 'Pendidikan Lanjut')->count();
        $totalWirausaha = AlumniModel::where('status', 'Wirausaha')->count();
        $totalBelumBekerja = AlumniModel::where('status', 'Belum Bekerja')->count();
        $totalTidakBekerja = AlumniModel::where('status', 'Tidak Bekerja')->count();

        return view('admin/homeadmin', compact('prestasi', 'lowongan', 'alumni', 'totalAlumni', 'totalLakiLaki', 'totalPerempuan', 'totalBekerja', 'totalKuliah', 'totalWirausaha', 'totalBelumBekerja', 'totalTidakBekerja'));
    }

    public function chartStatistik(Request $request)
    {
        $tahun_awal = $request->input('tahun_awal', now()->year - 3);
        $tahun_akhir = $request->input('tahun_akhir', now()->year);

        $alumni = AlumniModel::selectRaw('tahun_lulus, status, COUNT(*) as jumlah')
            ->groupBy('tahun_lulus', 'status')
            ->get();

        $data = [];
        foreach ($alumni as $item) {
            $data[$item->status][$item->tahun_lulus] = $item->jumlah;
        }

        return response()->json($data);
    }

    public function chartStatus(Request $request)
    {
        $tahun_awal = $request->input('tahun_awal', now()->year - 3);
        $tahun_akhir = $request->input('tahun_akhir', now()->year);

        $alumni = AlumniModel::selectRaw('tahun_lulus, status, COUNT(*) as jumlah')
            ->whereBetween('tahun_lulus', [$tahun_awal, $tahun_akhir])
            ->groupBy('tahun_lulus', 'status')
            ->get();

        $data = [];
        foreach ($alumni as $item) {
            $data[$item->status][$item->tahun_lulus] = $item->jumlah;
        }

        return response()->json($data);
    }
    public function chartJurusan(Request $request)
    {
        $tahun_awal = $request->input('tahun_awal', now()->year - 3);
        $tahun_akhir = $request->input('tahun_akhir', now()->year);

        $alumni = AlumniModel::selectRaw('jurusan, tahun_lulus, COUNT(*) as jumlah')
            ->groupBy('jurusan', 'tahun_lulus')
            ->get();

        $data = [];
        foreach ($alumni as $item) {
            $data[$item->jurusan][$item->tahun_lulus] = $item->jumlah;
        }

        $jurusan_list = array_keys($data);
        for ($tahun = $tahun_awal; $tahun <= $tahun_akhir; $tahun++) {
            foreach ($jurusan_list as $jurusan) {
                if (!isset($data[$jurusan][$tahun])) {
                    $data[$jurusan][$tahun] = 0;
                }
            }
        }

        foreach ($data as $jurusan => $tahunData) {
            ksort($data[$jurusan]);
        }

        return response()->json($data);
    }
    public function chartGender()
    {
        $data = AlumniModel::selectRaw('gender, COUNT(*) as jumlah')
            ->groupBy('gender')
            ->get();

        $formattedData = [
            'labels' => $data->pluck('gender')->map(function ($gender) {
                return $gender === 'L' ? 'Laki-Laki' : 'Perempuan';
            }),
            'data' => $data->pluck('jumlah'),
        ];

        return response()->json($formattedData);
    }
}
