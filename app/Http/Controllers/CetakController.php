<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnimodel;
use Illuminate\Support\Facades\Auth;

class CetakController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show()
    {
        $id_user_alumni = Auth::guard('alumni')->id();

        if ($id_user_alumni) {
            $alumni = Alumnimodel::where('id_user_alumni', $id_user_alumni)->first();

            if ($alumni) {
                return view('alumni/cetak', ['alumni' => $alumni]);
            } else {
                return redirect()->route('formalumni')->with('error', 'Data alumni tidak ditemukan. Silakan isi data Anda.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Anda belum login.');
        }
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}
}
