<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnimodel;
use App\Models\Lowonganmodel;
use App\Models\PrestasiModel;

class HomeController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show()
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
        return view('alumni/homealumni', compact('prestasi', 'lowongan', 'alumni', 'totalAlumni', 'totalLakiLaki', 'totalPerempuan', 'totalBekerja', 'totalKuliah', 'totalWirausaha', 'totalBelumBekerja', 'totalTidakBekerja'));
    }

    public function edit() {}

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}
}
