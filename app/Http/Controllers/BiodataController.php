<?php

namespace App\Http\Controllers;

use App\Models\Alumnimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class BiodataController extends Controller
{  
    public function index()
    {
        $alumni = Alumnimodel::all();
        return view('alumni/dataalumni', compact('alumni'));
    }

    // public function lamaran(Alumnimodel $alumnimodel, $id)
    // {
    //     // $alumni = Alumnimodel::all();
    //     $alumni = Alumnimodel::findOrFail($id); 
    //     return view('alumni/lamaran', compact('alumni'));
    // }

    public function create()
    {
        return view('alumni/inputalumni');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alumni' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'provinsi_tinggal' => 'required|string|max:255',
            'kabupaten_tinggal' => 'required|string|max:255',
            'kecamatan_tinggal' => 'required|string|max:255',
            'kelurahan_tinggal' => 'required|string|max:255',
            'alamat_tinggal' => 'required',
            'provinsi_domisili' => 'required|string|max:255',
            'kabupaten_domisili' => 'required|string|max:255',
            'kecamatan_domisili' => 'required|string|max:255',
            'kelurahan_domisili' => 'required|string|max:255',
            'alamat_domisili' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
            'jurusan_smk' => 'required',
            'no_telepon' => 'required|numeric',
            'no_telepon_alternatif' => 'required|numeric',
            'email' => 'required',
        ]);

        if ($request->status === 'Pendidikan Lanjut') {
            $request->validate([
                'universitas' => 'required',
                'prodi' => 'required',
            ]);
        } elseif ($request->status === 'Bekerja' || $request->status === 'Wirausaha') {
            $request->validate([
                'nama_perusahaan' => 'required',
                'bidang_pekerjaan' => 'required',
                'jabatan' => 'required',
                'penghasilan' => 'required|min:50000|numeric',
                'alamat_instansi' => 'required',
            ]);
        } elseif ($request->status === 'Belum Bekerja' || $request->status === 'Tidak Bekerja') {
            $request->validate([
                'alasan' => 'required',
            ]);
        }

        $id_user_alumni = Auth::guard('alumni')->id();

        $existingAlumni = Alumnimodel::where('id_user_alumni', $id_user_alumni)->first();
        if ($existingAlumni) {
            return response()->json(['error' => 'Data alumni sudah ada.'], 400);
        }

        $provinsi = explode('||', $request->get('provinsi_tinggal'));
        $kabupaten = explode('||', $request->get('kabupaten_tinggal'));
        $kecamatan = explode('||', $request->get('kecamatan_tinggal'));
        $kelurahan = explode('||', $request->get('kelurahan_tinggal'));

        $provinsi_domisili = explode('||', $request->get('provinsi_domisili'));
        $kabupaten_domisili = explode('||', $request->get('kabupaten_domisili'));
        $kecamatan_domisili = explode('||', $request->get('kecamatan_domisili'));
        $kelurahan_domisili = explode('||', $request->get('kelurahan_domisili'));

        $alumni = new Alumnimodel([
            'id_user_admin' => $request->get('id_user_admin'),
            'id_user_alumni' => $id_user_alumni,
            'nama_alumni' => $request->get('nama_alumni'),
            'nisn' => $request->get('nisn'),
            'nis' => $request->get('nis'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'gender' => $request->get('gender'),
            'agama' => $request->get('agama'),
            'status' => $request->get('status'),
            'alasan' => $request->get('alasan'),
            'provinsi' => $provinsi[1],
            'kabupaten' => $kabupaten[1],
            'kecamatan' => $kecamatan[1],
            'kelurahan' => $kelurahan[1],
            'alamat' => $request->get('alamat_tinggal'),
            'provinsi_domisili' => $provinsi_domisili[1],
            'kabupaten_domisili' => $kabupaten_domisili[1],
            'kecamatan_domisili' => $kecamatan_domisili[1],
            'kelurahan_domisili' => $kelurahan_domisili[1],
            'alamat_domisili' => $request->get('alamat_domisili'),
            'tahun_masuk' => $request->get('tahun_masuk'),
            'tahun_lulus' => $request->get('tahun_lulus'),
            'jurusan' => $request->get('jurusan_smk'),
            'perguruan_tinggi' => $request->get('universitas'),
            'prodi' => $request->get('prodi'),
            'nama_perusahaan' => $request->get('nama_perusahaan'),
            'bidang_pekerjaan' => $request->get('bidang_pekerjaan'),
            'jabatan' => $request->get('jabatan'),
            'pengahasilan' => $request->get('penghasilan'),
            'alamat_instansi' => $request->get('alamat_instansi'),
            'no_telepon' => $request->get('no_telepon'),
            'no_telepon_alternatif' => $request->get('no_telepon_alternatif'),
            'email' => $request->get('email'),
            'tanggal_up_data' => now(),
        ]);

        $saved = $alumni->save();

        if (!$saved) {
            $data_json = [
                'pesan' => 'Gagal Menambah Data Alumni',
                'alumni' => $alumni,
            ];
        } else {
            $data_json = [
                'pesan' => 'Sukses',
                'alumni' => $alumni,
            ];
        }

        return json_encode($data_json);
    }

    public function show()
    {
        $id_user_alumni = Auth::guard('alumni')->id();

        if ($id_user_alumni) {
            $alumni = Alumnimodel::where('id_user_alumni', $id_user_alumni)->first();

            if ($alumni) {
                return view('alumni/biodata', ['alumni' => $alumni]);
                Log::info('Alumni data:', ['alumni' => $alumni]);
            } else {
                return redirect()->route('formalumni')->with('error', 'Data alumni tidak ditemukan. Silakan lengkapi data Anda.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Anda belum login.');
        }
    }

    public function editbiodata()
    {

        $id_user_alumni = Auth::guard('alumni')->id();

        if ($id_user_alumni) {

            $alumni = Alumnimodel::where('id_user_alumni', $id_user_alumni)->first();


            if ($alumni) {
                return view('alumni/editbiodata', ['alumni' => $alumni]);
            } else {
                return redirect()->route('formalumni')->with('error', 'Data alumni tidak ditemukan. Silakan lengkapi data Anda.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Anda belum login.');
        }
        return response()->json([
            'pesan' => 'Data berhasil diperbarui',
        ]);
    }

    public function edit(Alumnimodel $alumnimodel, $id)
    {
        $data_edit = $alumnimodel::where('id_alumni', $id)->first();

        $data = [
            'data_view' => $data_edit,
        ];
        return view('profile/editbiodata', $data);
    }

    public function update(Request $request)
    {

        $id_user_alumni = Auth::guard('alumni')->id();

        if ($id_user_alumni) {

            $alumni = Alumnimodel::where('id_user_alumni', $id_user_alumni)->first();
            if ($alumni) {
                $request->validate([
                    'nama_alumni' => 'required',
                    'nisn' => 'required',
                    'nis' => 'required',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required|date',
                    'gender' => 'required',
                    'agama' => 'required',
                    'status' => 'required',
                    'provinsi_tinggal' => 'required|string|max:255',
                    'kabupaten_tinggal' => 'required|string|max:255',
                    'kecamatan_tinggal' => 'required|string|max:255',
                    'kelurahan_tinggal' => 'required|string|max:255',
                    'alamat_tinggal' => 'required',
                    'provinsi_domisili' => 'required|string|max:255',
                    'kabupaten_domisili' => 'required|string|max:255',
                    'kecamatan_domisili' => 'required|string|max:255',
                    'kelurahan_domisili' => 'required|string|max:255',
                    'alamat_domisili' => 'required',
                    'tahun_masuk' => 'required',
                    'tahun_lulus' => 'required',
                    'jurusan_smk' => 'required',
                    'no_telepon' => 'required|numeric',
                    'no_telepon_alternatif' => 'required|numeric',
                    'email' => 'required',
                ]);

                $provinsi = explode('||', $request->get('provinsi_tinggal'));
                $kabupaten = explode('||', $request->get('kabupaten_tinggal'));
                $kecamatan = explode('||', $request->get('kecamatan_tinggal'));
                $kelurahan = explode('||', $request->get('kelurahan_tinggal'));

                $provinsi_domisili = explode('||', $request->get('provinsi_domisili'));
                $kabupaten_domisili = explode('||', $request->get('kabupaten_domisili'));
                $kecamatan_domisili = explode('||', $request->get('kecamatan_domisili'));
                $kelurahan_domisili = explode('||', $request->get('kelurahan_domisili'));

                $alumni->id_user_admin = $request->get('id_user_admin');
                $alumni->id_user_alumni = $id_user_alumni;
                $alumni->nama_alumni = $request->get('nama_alumni');
                $alumni->nisn = $request->get('nisn');
                $alumni->nis = $request->get('nis');
                $alumni->tempat_lahir = $request->get('tempat_lahir');
                $alumni->tanggal_lahir = $request->get('tanggal_lahir');
                $alumni->gender = $request->get('gender');
                $alumni->agama = $request->get('agama');
                $alumni->status = $request->get('status');
                $alumni->alasan = $request->get('alasan');
                $alumni->provinsi = $provinsi[1];
                $alumni->kabupaten = $kabupaten[1];
                $alumni->kecamatan = $kecamatan[1];
                $alumni->kelurahan = $kelurahan[1];
                $alumni->alamat = $request->get('alamat_tinggal');
                $alumni->provinsi_domisili = $provinsi_domisili[1];
                $alumni->kabupaten_domisili = $kabupaten_domisili[1];
                $alumni->kecamatan_domisili = $kecamatan_domisili[1];
                $alumni->kelurahan_domisili = $kelurahan_domisili[1];
                $alumni->alamat_domisili = $request->get('alamat_domisili');
                $alumni->tahun_masuk = $request->get('tahun_masuk');
                $alumni->tahun_lulus = $request->get('tahun_lulus');
                $alumni->jurusan = $request->get('jurusan_smk');
                $alumni->perguruan_tinggi = $request->get('universitas');
                $alumni->prodi = $request->get('prodi');
                $alumni->nama_perusahaan = $request->get('nama_perusahaan');
                $alumni->bidang_pekerjaan = $request->get('bidang_pekerjaan');
                $alumni->jabatan = $request->get('jabatan');
                $alumni->penghasilan = $request->get('penghasilan');
                $alumni->alamat_instansi = $request->get('alamat_instansi');
                $alumni->no_telepon = $request->get('no_telepon');
                $alumni->no_telepon_alternatif = $request->get('no_telepon_alternatif');
                $alumni->email = $request->get('email');
                $alumni->tanggal_up_data = now();

                $alumni->save();

                return response()->json(['pesan' => 'Data berhasil diperbarui!']);
            } else {
                return response()->json(['error' => 'Data alumni tidak ditemukan.'], 404);
            }
        } else {
            return response()->json(['error' => 'Anda belum login.'], 401);
        }
    }

    public function updateKeterangan(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:alumni,id_alumni',
            'keterangan' => 'required|string',
        ]);

        $alumni = Alumnimodel::findOrFail($request->id_alumni);
        $alumni->keterangan = $request->keterangan;
        $alumni->save();

        return redirect()->back()->with('success', 'Keterangan alumni berhasil diubah.');
    }

    public function destroy(Alumnimodel $alumnimodel, Request $request)
    {
        $id = $request->get('id_alumni');

        $data_db = Alumnimodel::find($id);

        if ($data_db != null) {
            $data_db->delete();
        }

        $data_json = [
            'pesan' => 'Sukses Hapus Alumni',
            'data_delete' => $data_db,
        ];

        return json_encode($data_json);
    }

    public function getListLowongan(Alumnimodel $alumnimodel)
    {
        $data = $alumnimodel::all();

        return json_encode($data);
    }

    public function getByKode(Alumnimodel $alumnimodel, $id_alumni)
    {
        $data = $alumnimodel::where('id_alumni', 'LIKE', "%{$id_alumni}%")->get();

        return json_encode($data);
    }
}
