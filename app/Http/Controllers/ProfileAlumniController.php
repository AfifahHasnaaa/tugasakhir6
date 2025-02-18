<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProfileAlumniController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show()
    {
        if (!Auth::guard('alumni')->check()) {
            return redirect()->route('login');
        }
        return view('alumni/profile');
    }

    public function editpassword()
    {
        return view('alumni/editpassword');
    }

    public function editusername()
    {
        return view('alumni/editusername');
    }

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}
}
