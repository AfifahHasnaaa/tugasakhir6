<?php

namespace App\Http\Controllers;

use App\Models\KecamatanModel;
use App\Models\Alumnimodel;
use App\Models\KelurahanModel;
use App\Models\KotaModel;
use App\Models\Lowonganmodel;
use Illuminate\Pagination\Paginator;
use App\Models\ProvinsiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lowongan extends Controller
{
    public function index()
    {
        $lowongan = Lowonganmodel::all();
        return view('lowongan/daftarlowongan', compact('lowongan'));
    }
    public function lamaran(Alumnimodel $alumnimodel, $id)
    {
        // $alumni = Alumnimodel::all();
        if (!Auth::guard('alumni')->check()) {
            return redirect()->route('login.alumni');
        }
        $alum = Alumnimodel::findOrFail($id); 
        return view('alumni/lamaran', compact('alum'));
    }
    // public function side(Alumnimodel $alumnimodel, $id)
    // {
    //     // $alumni = Alumnimodel::all();
    //     $alum = Alumnimodel::findOrFail($id); 
    //     return view('layout/alumniLayout', compact('alum'));
    // }

    public function showLowongan()
    {
        $lowongan = Lowonganmodel::orderBy('tanggal_up_lowongan', 'desc')->paginate()->withQueryString();
        return view('alumni/lowongan', compact('lowongan'));
    }
    public function showDetail(Lowonganmodel $lowonganmodel, $id)
    {
        $lowongan = Lowonganmodel::findOrFail($id);
        return view('alumni/detaillowongan', compact('lowongan'));
    }

    public function showLowonganGuest()
    {
        $lowongan = Lowonganmodel::orderBy('tanggal_up_lowongan', 'desc')->paginate();
        return view('guest/lowongan', compact('lowongan'));
    }
    public function showDetailGuest(Lowonganmodel $lowonganmodel, $id)
    {
        $lowongan = Lowonganmodel::findOrFail($id);
        return view('guest/detaillowongan', compact('lowongan'));
    }

    public function showLowonganadmin()
    {
        $lowongan = Lowonganmodel::orderBy('tanggal_up_lowongan', 'desc')->paginate();
        return view('admin/lowongan', compact('lowongan'));
    }
    public function showDetailadmin(Lowonganmodel $lowonganmodel, $id)
    {
        $lowongan = Lowonganmodel::findOrFail($id);
        return view('admin/detaillowongan', compact('lowongan'));
    }

    public function create()
    {
        return view('admin/tambahlowongan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user_admin' => 'required|exists:user_admin,id_user',
            'nama_instansi' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'syarat_pengalaman' => 'required',
            'gender' => 'required',
            'gaji' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'posisi' => 'required',
            'syarat_pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'no_kontak' => 'required|numeric',
            'email' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $logo_name = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $instansi_name = preg_replace('/\s+/', '_', ucwords($request->get('nama_instansi')));
            $logo_name = $instansi_name . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('storage/logo'), $logo_name);
        }
        $provinsi = explode('||', $request->get('provinsi'));
        $kabupaten = explode('||', $request->get('kabupaten'));
        $kecamatan = explode('||', $request->get('kecamatan'));
        $kelurahan = explode('||', $request->get('kelurahan'));

        $lowongan = new Lowonganmodel([
            'id_user_admin' => $request->get('id_user_admin'),
            'nama_instansi' => $request->get('nama_instansi'),
            'deskripsi' => $request->get('deskripsi'),
            'posisi' => $request->get('posisi'),
            'syarat_pengalaman' => $request->get('syarat_pengalaman'),
            'gender' => $request->get('gender'),
            'gaji' => $request->get('gaji'),
            'provinsi' => $provinsi[1],
            'kabupaten' => $kabupaten[1],
            'kecamatan' => $kecamatan[1],
            'kelurahan' => $kelurahan[1],
            'posisi' => $request->get('posisi'),
            'syarat_pekerjaan' => $request->get('syarat_pekerjaan'),
            'alamat' => $request->get('alamat'),
            'deskripsi_pekerjaan' => $request->get('deskripsi_pekerjaan'),
            'no_kontak' => $request->get('no_kontak'),
            'email' => $request->get('email'),
            'logo' => $logo_name,
            'tanggal_up_lowongan' => now(),
        ]);

        $saved = $lowongan->save();

        if ($saved) {
            $lowongan->refresh();
            return response()->json([
                'pesan' => 'Sukses',
                'id_lowongan' => $lowongan->id_lowongan,
            ]);
        } else {
            return response()->json([
                'pesan' => 'Gagal Menambah Data Lowongan',
            ], 500);
        }
    }

    public function show() {}

    public function edit(LowonganModel $lowonganModel, $id)
    {

        $data_detail = $lowonganModel::where('id_lowongan', $id)->first();
        $data = [
            'data_view' => $data_detail,
            'gaji' => $data_detail->gaji,
        ];

        return view('admin/editlowongan', $data);
    }


    public function update(Request $request, $id_lowongan)
    {
        $data_db = Lowonganmodel::findOrFail($id_lowongan);

        $validatedData = $request->validate([
            'id_user_admin' => 'unique:lowongan,id_user_admin,' . $id_lowongan,
            'nama_instansi' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'syarat_pengalaman' => 'required',
            'gender' => 'required',
            'gaji' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'syarat_pekerjaan' => 'required',
            'alamat' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'no_kontak' => 'required|numeric',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (!$data_db) {
            return json_encode(['pesan' => 'Data tidak ditemukan']);
        }

        if ($request->hasFile('logo')) {
            if ($data_db->logo && file_exists(public_path('storage/logo/' . $data_db->logo))) {
                unlink(public_path('storage/logo/' . $data_db->logo));
            }

            $logo = $request->file('logo');
            $instansi_name = preg_replace('/\s+/', '_', ucwords($request->get('nama_instansi')));
            $logo_name = $instansi_name . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('storage/logo'), $logo_name);

            $data_db->logo = $logo_name;
        }

        $data_db->id_user_admin = $request->get('id_user_admin');
        $data_db->nama_instansi = $request->get('nama_instansi');
        $data_db->deskripsi = $request->get('deskripsi');
        $data_db->posisi = $request->get('posisi');
        $data_db->syarat_pengalaman = $request->get('syarat_pengalaman');
        $data_db->gender = $request->get('gender');
        $data_db->gaji = $request->get('gaji');
        $data_db->provinsi = explode('||', $request->get('provinsi'))[1] ?? $data_db->provinsi;
        $data_db->kabupaten = explode('||', $request->get('kabupaten'))[1] ?? $data_db->kabupaten;
        $data_db->kecamatan = explode('||', $request->get('kecamatan'))[1] ?? $data_db->kecamatan;
        $data_db->kelurahan = explode('||', $request->get('kelurahan'))[1] ?? $data_db->kelurahan;
        $data_db->syarat_pekerjaan = $request->get('syarat_pekerjaan');
        $data_db->alamat = $request->get('alamat');
        $data_db->deskripsi_pekerjaan = $request->get('deskripsi_pekerjaan');
        $data_db->no_kontak = $request->get('no_kontak');
        $data_db->email = $request->get('email');
        $data_db->tanggal_up_lowongan = now();

        if ($data_db->save()) {
            return json_encode(['pesan' => 'Sukses', 'lowongan' => $data_db]);
        } else {
            return json_encode(['pesan' => 'Gagal Menyimpan Data', 'lowongan' => $data_db]);
        }
    }


    public function destroy(Lowonganmodel $lowonganmodel, $id_lowongan)
    {
        $lowongan = Lowonganmodel::find($id_lowongan);
        if ($lowongan) {
            $lowongan->delete();
            return redirect()->route('lowonganadmin')->with('success', 'Data lowongan berhasil dihapus.');
        }
        return redirect()->route('lowonganadmin')->with('error', 'Data lowongan tidak ditemukan.');
    }

    public function getListLowongan(Lowonganmodel $lowonganmodel)
    {
        $data = $lowonganmodel::all();

        return json_encode($data);
    }

    public function getByKode(Lowonganmodel $lowonganmodel, $id_lowongan)
    {
        $data = $lowonganmodel::where('id_lowongan', 'LIKE', "%{$id_lowongan}%")->get();

        return json_encode($data);
    }

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
}
