<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestasiModel;
use App\Models\Alumnimodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = PrestasiModel::all();
        return view('admin.prestasi', compact('prestasi'));
    }


    public function showPrestasi()
    {
        $prestasi = PrestasiModel::all();
        return view('guest/beranda', compact('prestasi'));
    }

    public function create()
    {
        return view('admin/tambahprestasi');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer',
            'keterangan' => 'required|string',
            'tempat' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'prestasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_file = preg_replace('/\s+/', '_', ucwords($request->get('nama')));
            $nama_foto = $nama_file . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/foto_prestasi'), $nama_foto);
            $validatedData['foto'] = 'storage/foto_prestasi/' . $nama_foto;
        }
        $id_user_admin = Auth::guard('admin')->id();
        $validatedData['id_user_admin'] = $id_user_admin;

        PrestasiModel::create($validatedData);

        return redirect()->route('prestasi')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function show() {}

    public function edit($id)
    {
        $prestasi = PrestasiModel::find($id);
        if (!$prestasi) {
            return redirect()->route('prestasi.index')->with('error', 'Prestasi tidak ditemukan.');
        }
        return view('admin.editprestasi', compact('prestasi'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer',
            'keterangan' => 'required|string',
            'tempat' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'prestasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $prestasi = PrestasiModel::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                $oldFotoPath = public_path($prestasi->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            $foto = $request->file('foto');
            $nama_file = preg_replace('/\s+/', '_', ucwords($request->get('nama')));
            $nama_foto = $nama_file . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/foto_prestasi'), $nama_foto);
            $validatedData['foto'] = 'storage/foto_prestasi/' . $nama_foto;
        }

        $prestasi->update($validatedData);

        return redirect()->route('prestasi')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(PrestasiModel $prestasiModel, $id_prestasi)
    {
        $prestasi = PrestasiModel::findOrFail($id_prestasi);

        if ($prestasi) {
            if ($prestasi->foto) {
                $fotoPath = public_path($prestasi->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $prestasi->delete();

            return redirect()->route('prestasi')->with('success', 'Data Prestasi dan file foto berhasil dihapus.');
        }

        return redirect()->route('prestasi')->with('error', 'Data Prestasi tidak ditemukan.');
    }

    //aluni
    
    public function indext()
    {
        $prestasi = PrestasiModel::all();
        return view('alumni.prestasi', compact('prestasi'));
    }

    public function createe()
    {
        return view('alumni/tambahprestasi');
    }

    public function storee(Request $request)
    {
        $validatedData = $request->validate([
            'prestasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_file = preg_replace('/\s+/', '_', ucwords($request->get('nama')));
            $nama_foto = $nama_file . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/foto_prestasi'), $nama_foto);
            $validatedData['foto'] = 'storage/foto_prestasi/' . $nama_foto;
        }
        $id_user_alumni = Auth::guard('alumni')->id();
        $validatedData['id_user_alumni'] = $id_user_alumni;

        PrestasiModel::create($validatedData);

        return redirect()->route('prestasiuser')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function showw() {}

    public function editt($id)
    {
        $prestasi = PrestasiModel::find($id);
        if (!$prestasi) {
            return redirect()->route('prestasi.index')->with('error', 'Prestasi tidak ditemukan.');
        }
        return view('alumni.editprestasi', compact('prestasi'));
    }


    public function updatee(Request $request, $id)
    {
        $validatedData = $request->validate([
            'prestasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $prestasi = PrestasiModel::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                $oldFotoPath = public_path($prestasi->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            $foto = $request->file('foto');
            $nama_file = preg_replace('/\s+/', '_', ucwords($request->get('nama')));
            $nama_foto = $nama_file . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/foto_prestasi'), $nama_foto);
            $validatedData['foto'] = 'storage/foto_prestasi/' . $nama_foto;
        }

        $prestasi->update($validatedData);

        return redirect()->route('prestasiuser')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroyy(PrestasiModel $prestasiModel, $id_prestasi)
    {
        $prestasi = PrestasiModel::findOrFail($id_prestasi);

        if ($prestasi) {
            if ($prestasi->foto) {
                $fotoPath = public_path($prestasi->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $prestasi->delete();

            return redirect()->route('prestasiuser')->with('success', 'Data Prestasi dan file foto berhasil dihapus.');
        }

        return redirect()->route('prestasiuser')->with('error', 'Data Prestasi tidak ditemukan.');
    }

}
