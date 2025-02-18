<?php

namespace App\Http\Controllers;

use App\Models\UserAlumniModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

Carbon::setLocale('id');

class DataUser extends Controller{

    //form alumni
    public function showData()
    {
        $data = UserAlumniModel::all();  
        return view('admin/datauser', compact('data'));
    }
    public function create()
    {
        // return view('alumni/inputalumni');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tanggal_buat' => 'required|date',
            'tanggal_login' => 'required|date',
        ]);

        $user = new UserAlumniModel([
            'id_user' => $request->get('id_user'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'tanggal_buat' => $request->get('tanggal_buat'),
            'tanggal_login' => $request->get('tanggal_login'),
        ]);

        $saved = $user->save();

        if ($saved) {
            $user->refresh();
            return response()->json([
                'pesan' => 'Sukses',
                'id_user' => $user->id_user,
            ]);
        } else {
            return response()->json([
                'pesan' => 'Gagal Menambah Data',
            ], 500);
        }
    }

    public function updateUser(Request $request, $id)
        {
            $user = UserAlumniModel::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan');
            }

            $user->update([
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email
            ]);

            return redirect('/adminuser')->with('success', 'Data berhasil diperbarui');
        }
    //tabel data alumni
    public function dataDatables(Request $request)
    {
        $search = $request->query('search');
        $order = $request->query('order');
        $orderby = match ($order[0]['column']) {
            '1' => 'username',
            '2' => 'email',
            '3' => 'password',
            '4' => 'tanggal_buat',
            '5' => 'tanggal_login',
            default => 'id_user',
        };

        $data_db = UserAlumniModel::query();

        if (!empty($search['value'])) {
            $data_db->where(function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search['value'] . '%')
                    ->orWhere('email', 'like', '%' . $search['value'] . '%')
                    ->orWhere('tanggal_buat', 'like', '%' . $search['value'] . '%')
                    ->orWhere('tanggal_login', 'like', '%' . $search['value'] . '%');
            });
        }

        $data_db_total = UserAlumniModel::count();

        $data_db_filtered = $data_db->count();

        $data_db = $data_db->offset($request->query('start'))
            ->limit($request->query('length'))
            ->orderBy($orderby, $order[0]['dir'])
            ->get();

        $data_formatted = [];
        foreach ($data_db as $key => $value) {
            $row_data = [];
            $row_data[] = $key + 1;
            $row_data[] = $value->username;
            $row_data[] = $value->email;
            $row_data[] = $value->password;
            $row_data[] = $value->tanggal_buat;
            $row_data[] = $value->tanggal_login;

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
    public function destroy(UserAlumniModel $userAlumniModel, $id_user)
    {
        $data = UserAlumniModel::find($id_user);
        if ($data) {
            $data->delete();
            return redirect()->route('datauser')->with('success', 'Data user berhasil dihapus.');
        }
        return redirect()->route('datauser')->with('error', 'Data user tidak ditemukan.');
    }

    public function getByKode(UserAlumniModel $useralumnimodel, $kode)
    {
        $data = $useralumnimodel::where('id_user', 'LIKE', "%{$kode}%")->get();

        return json_encode($data);
    }

    public function edituser()
    {
        return view('admin/edituser');
    }

    public function update(Request $request, string $id) {}

}
