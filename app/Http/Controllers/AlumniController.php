<?php

namespace App\Http\Controllers;

use App\Models\Alumnimodel;
use App\Models\KelurahanModel;
use App\Models\KecamatanModel;
use App\Models\KotaModel;
use App\Models\ProvinsiModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exports\AlumniMultiSheetExport;
use Maatwebsite\Excel\Facades\Excel;

Carbon::setLocale('id');



class AlumniController extends Controller

{
    //download excel
    public function exportExcel()
    {
        return Excel::download(new AlumniMultiSheetExport, 'data_alumni_smkn1_bantul_' . Carbon::now()->translatedformat('d-F-Y') . '.xlsx');
    }

    //data alumni
    public function showDataAlumni()
    {
        $alumni = Alumnimodel::all();
        return view('alumni/dataalumni', compact('alumni'));
    }

    public function showDataAlumniAdmin(Request $request)
    {
        $entriesPerPage = $request->input('entriesPerPage', 10);
        $alumni = Alumnimodel::orderBy('nama_alumni', 'asc')
            ->orderBy('jurusan', 'asc')
            ->paginate($entriesPerPage);

        return view('admin/dataalumni', compact('alumni'));
    }

    public function showDataAlumnii()
    {
        $alumni = Alumnimodel::all();
        return view('guest/dataalumni', compact('alumni'));
    }

    //detail alumni
    public function detail(Alumnimodel $alumnimodel, $id)
    {
        $alumni = Alumnimodel::findOrFail($id);
        return view('admin/detailalumni', compact('alumni'));
    }

    //form alumni
    public function create()
    {
        return view('alumni/inputalumni');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alumni' => 'required',
            'nisn' => 'required|numeric|digits:10',
            'nis' => 'required|numeric|digits_between:4,8',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'alasan' => '',
            'provinsi_tinggal' => 'required',
            'kabupaten_tinggal' => 'required',
            'kecamatan_tinggal' => 'required',
            'kelurahan_tinggal' => 'required',
            'alamat_tinggal' => 'required',
            'provinsi_domisili' => 'required',
            'kabupaten_domisili' => 'required',
            'kecamatan_domisili' => 'required',
            'kelurahan_domisili' => 'required',
            'alamat_domisili' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
            'jurusan_smk' => 'required',
            'universitas' => '',
            'prodi' => '',
            'nama_perusahaan' => '',
            'bidang_pekerjaan' => '',
            'jabatan' => '',
            'pengahasilan' => '',
            'alamat_instansi' => '',
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

        $alumni = new Alumnimodel([
            'id_user_admin' => $request->get('id_user_admin'),
            'id_user_alumni' => $request->get('id_user_user'),
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
            'penghasilan' => $request->get('penghasilan'),
            'alamat_instansi' => $request->get('alamat_instansi'),
            'no_telepon' => $request->get('no_telepon'),
            'no_telepon_alternatif' => $request->get('no_telepon_alternatif'),
            'email' => $request->get('email'),
            'tanggal_up_data' => now(),
        ]);

        $saved = $alumni->save();

        if ($saved) {
            $alumni->refresh();
            return response()->json([
                'pesan' => 'Sukses',
                'id_alumni' => $alumni->id_alumni,
            ]);
        } else {
            return response()->json([
                'pesan' => 'Gagal Menambah Data Lowongan',
            ], 500);
        }
    }

    //alamat
    public function get_prov()
    {
        $list = ProvinsiModel::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();

        $html_select = '<option disabled selected>Pilih Provinsi</option>';
        foreach ($list as $key => $value) {
            $html_select .= '<option value = "' . $value->id . '||' . $value->name . '">' . $value->name . '</option>';
        }

        return $html_select;
    }

    public function get_kota($kode)
    {
        $list = KotaModel::select('id', 'name')
            ->where('province_id', $kode)
            ->orderBy('name', 'ASC')
            ->get();

        $html_select = '<option disabled selected>Pilih Kabupaten</option>';
        foreach ($list as $key => $value) {
            $html_select .= '<option value = "' . $value->id . '||' . $value->name . '">' . $value->name . '</option>';
        }

        return $html_select;
    }

    public function get_kec($kode)
    {
        $list = KecamatanModel::select('id', 'name')
            ->where('regency_id', $kode)
            ->orderBy('name', 'ASC')
            ->get();

        $html_select = '<option disabled selected>Pilih Kecamatan</option>';
        foreach ($list as $key => $value) {
            $html_select .= '<option value = "' . $value->id . '||' . $value->name . '">' . $value->name . '</option>';
        }

        return $html_select;
    }

    public function get_kel($kode)
    {
        $list = KelurahanModel::select('id', 'name')
            ->where('district_id', $kode)
            ->orderBy('name', 'ASC')
            ->get();

        $html_select = '<option disabled selected>Pilih Kelurahan</option>';
        foreach ($list as $key => $value) {
            $html_select .= '<option value = "' . $value->id . '||' . $value->name . '">' . $value->name . '</option>';
        }

        return $html_select;
    }

    //tabel data alumni
    public function dataDatables(Request $request)
    {
        $search = $request->query('search');
        $order = $request->query('order');
        $search_nama = $request->query('nama_alumni');
        $search_jurusan = $request->query('jurusan');
        $search_status = $request->query('status');
        $search_tahun_lulus = $request->query('tahun_lulus');

        $orderby = match ($order[0]['column']) {
            '1' => 'nama_alumni',
            '2' => 'jurusan',
            '3' => 'tahun_lulus',
            '4' => 'status',
            default => 'id_user_alumni',
        };

        $data_db = AlumniModel::query();

        if (!empty($search['value'])) {
            $data_db->where(function ($query) use ($search) {
                $query->where('nama_alumni', 'like', '%' . $search['value'] . '%')
                    ->orWhere('jurusan', 'like', '%' . $search['value'] . '%')
                    ->orWhere('status', 'like', '%' . $search['value'] . '%')
                    ->orWhere('tahun_lulus', 'like', '%' . $search['value'] . '%');
            });
        }

        if ($search_nama) {
            $data_db->where('nama_alumni', 'like', '%' . $search_nama . '%');
        }

        if ($search_jurusan) {
            $data_db->where('jurusan', 'like', '%' . $search_jurusan . '%');
        }

        if ($search_status) {
            $data_db->where('status', 'like', '%' . $search_status . '%');
        }

        if ($search_tahun_lulus) {
            $data_db->where('tahun_lulus', 'like', '%' . $search_tahun_lulus . '%');
        }

        $data_db_total = AlumniModel::count();

        $data_db_filtered = $data_db->count();

        $data_db = $data_db->offset($request->query('start'))
            ->limit($request->query('length'))
            ->orderBy($orderby, $order[0]['dir'])
            ->get();

        $data_formatted = [];
        foreach ($data_db as $key => $value) {
            $row_data = [];
            $row_data[] = $key + 1;
            $row_data[] = $value->nama_alumni;
            $row_data[] = $value->jurusan;
            $row_data[] = $value->tahun_lulus;
            $row_data[] = $value->status;

            if ($value->status == 'Pendidikan Lanjut') {
                $row_data[] = $value->perguruan_tinggi;
            } elseif ($value->status == 'Bekerja' || $value->status == 'Wirausaha') {
                $row_data[] = $value->nama_perusahaan;
            } elseif ($value->status == 'Tidak Bekerja' || $value->status == 'Belum Bekerja') {
                $row_data[] = $value->alasan;
            }

            $aksi_button = '<div class="action-buttons">
                            <a href="' . route('detailalumni', ['id' => $value->id_alumni]) . '">
                                <button class="btn-detail"><i class="bi bi-box-arrow-up-right"></i></button>
                            </a>
                        </div>';
            $row_data[] = $aksi_button;

            $data_formatted[] = $row_data;
        }

        $data_json = [
            'draw' => $request->query('draw'),
            'recordsTotal' => $data_db_total,
            'recordsFiltered' => $data_db_filtered,
            'data' => $data_formatted
        ];

        return json_encode($data_json);
    }

    //hapus data alumni
    public function destroy(Alumnimodel $alumniModel, $id_alumni)
    {
        $alumni = Alumnimodel::find($id_alumni);
        if ($alumni) {
            $alumni->delete();
            return redirect()->route('dataalumniadmin')->with('success', 'Data alumni berhasil dihapus.');
        }
        return redirect()->route('dataalumniadmin')->with('error', 'Data alumni tidak ditemukan.');
    }

    //foto profil
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $alumni = Auth::guard('alumni')->user();
        $foto = $request->file('foto');
        $fotoName = time() . '_' . $alumni->username . '.' . $foto->getClientOriginalExtension();

        $foto->move(public_path('asset/profil'), $fotoName);

        if ($alumni->foto && file_exists(public_path('asset/profil/' . $alumni->foto))) {
            unlink(public_path('asset/profil/' . $alumni->foto));
        }

        $alumni->foto = $fotoName;
        $alumni->save();

        return response()->json(['success' => true, 'message' => 'Foto profil berhasil diperbarui!']);
    }

    public function getByKode(AlumniModel $alumnimodel, $kode)
    {
        $data = $alumnimodel::where('id_user_alumni', 'LIKE', "%{$kode}%")->get();

        return json_encode($data);
    }
}
