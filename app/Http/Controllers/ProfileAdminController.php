<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnimodel;
use Illuminate\Support\Facades\Auth;


class ProfileAdminController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login.admin');
        }
        return view('admin/profile');
    }

    public function editpassword()
    {
        return view('admin/editpassword');
    }

    public function editusername()
    {
        return view('admin/editusername');
    }

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $admin = Auth::guard('admin')->user();
        $foto = $request->file('foto');
        $fotoName = time() . '_' . $admin->username . '.' . $foto->getClientOriginalExtension();

        $foto->move(public_path('asset/profil'), $fotoName);

        if ($admin->foto && file_exists(public_path('asset/profil/' . $admin->foto))) {
            unlink(public_path('asset/profil/' . $admin->foto));
        }

        $admin->foto = $fotoName;
        $admin->save();

        return response()->json(['success' => true, 'message' => 'Foto profil berhasil diperbarui!']);
    }
}
