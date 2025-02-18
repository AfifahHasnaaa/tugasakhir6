<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAlumniModel;
use App\Models\UserAdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    //daftar
    public function showRegisterForm()
    {
        return view('daftar');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:user_alumni',
            'email' => 'required|string|email|max:255|unique:user_alumni',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required',
        ], [
            'username.unique' => 'Username sudah terdaftar.',
            'password.min' => 'Password harus terdiri dari minimal :min karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'g-recaptcha-response.required' => 'Anda harus menyelesaikan reCAPTCHA.',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('password') && $validator->errors()->first('password') === 'Konfirmasi password tidak sesuai.') {
                $validator->errors()->add('password_confirmation', $validator->errors()->first('password'));
                $validator->errors()->forget('password');
            }
            return back()->withErrors($validator)->withInput();
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!json_decode($response->body())->success) {
            return back()->withErrors(['g-recaptcha-response' => 'Validasi reCAPTCHA gagal. Silakan coba lagi.'])->withInput();
        }

        $UserAlumniModel = UserAlumniModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tanggal_buat' => now(),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan masuk.');
    }

    //masuk alumni
    public function showLoginFormAlumni()
    {
        return view('login');
    }

    public function loginAlumni(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required',
        ], [
            'username.required' => 'Username atau email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'g-recaptcha-response.required' => 'Anda harus menyelesaikan reCAPTCHA.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!json_decode($response->body())->success) {
            return back()->withErrors(['g-recaptcha-response' => 'Validasi reCAPTCHA gagal. Silakan coba lagi.'])->withInput();
        }

        $loginField = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('alumni')->attempt($credentials)) {
            $userAlumni = Auth::guard('alumni')->user();

            if ($userAlumni instanceof UserAlumniModel) {
                $userAlumni->tanggal_login = Carbon::now('Asia/Jakarta');
                $userAlumni->save();
                session(['id_user_alumni' => $userAlumni->id]);
            }

            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'error' => 'Email atau kata sandi anda salah!',
            ])->withInput();
        }
    }

    //masuk admin
    public function showLoginFormAdmin()
    {
        return view('loginadmin');
    }

    public function loginAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required',
        ], [
            'username.required' => 'Username atau email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'g-recaptcha-response.required' => 'Anda harus menyelesaikan reCAPTCHA.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!json_decode($response->body())->success) {
            return back()->withErrors(['g-recaptcha-response' => 'Validasi reCAPTCHA gagal. Silakan coba lagi.'])->withInput();
        }

        $loginField = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            $userAdmin = Auth::guard('admin')->user();

            if ($userAdmin instanceof UserAdminModel) {
                $userAdmin->tanggal_login = Carbon::now('Asia/Jakarta');
                $userAdmin->save();
            }
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors([
                'error' => 'Email atau kata sandi anda salah!',
            ])->withInput();
        }
    }

    //edit profil alumni
    public function updatePasswordAlumni(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ], [
            'password_baru.min' => 'Kata sandi baru harus terdiri dari minimal :min karakter.',
            'password_baru.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $userAlumni = Auth::guard('alumni')->user();

        if ($userAlumni instanceof UserAlumniModel) {
            if (Hash::check($request->password_lama, $userAlumni->password)) {
                $userAlumni->password = Hash::make($request->password_baru);
                $userAlumni->save();

                return redirect()->back()->with('success', 'Kata sandi berhasil diganti.');
            } else {
                return back()->withErrors(['password_lama' => 'Kata sandi lama tidak cocok!']);
            }
        }

        return back()->withErrors(['error' => 'Pengguna tidak ditemukan.']);
    }

    public function updateUsernameAlumni(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user_alumni,username,' . Auth::id() . ',id_user',
            'password' => 'required|string',
        ], [
            'username.unique' => 'Username sudah dipakai.',
            'password.required' => 'Kata sandi salah.',
        ]);

        $userAlumni = Auth::guard('alumni')->user();

        if (!Hash::check($request->password, $userAlumni->password)) {
            return redirect()->back()->withErrors(['password' => 'Kata sandi salah.']);
        }

        $userAlumni->username = $request->username;
        $userAlumni->save();

        return redirect()->back()->with('success', 'Username berhasil diperbarui.');
    }

    //edit profil admin
    public function updatePasswordAdmin(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ], [
            'password_baru.min' => 'Kata sandi baru harus terdiri dari minimal :min karakter.',
            'password_baru.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $userAdmin = Auth::guard('admin')->user();

        if ($userAdmin instanceof UserAdminModel) {
            if (Hash::check($request->password_lama, $userAdmin->password)) {
                $userAdmin->password = Hash::make($request->password_baru);
                $userAdmin->save();

                return redirect()->back()->with('success', 'Kata sandi berhasil diganti.');
            } else {
                return back()->withErrors(['password_lama' => 'Kata sandi lama tidak cocok!']);
            }
        }

        return back()->withErrors(['error' => 'Pengguna tidak ditemukan.']);
    }

    public function updateUsernameAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user_admin,username,' . Auth::id() . ',id_user',
            'password' => 'required|string',
        ], [
            'username.unique' => 'Username sudah dipakai.',
            'password.required' => 'Kata sandi salah.',
        ]);

        $userAdmin = Auth::guard('admin')->user();

        if (!Hash::check($request->password, $userAdmin->password)) {
            return redirect()->back()->withErrors(['password' => 'Kata sandi salah.']);
        }

        $userAdmin->username = $request->username;
        $userAdmin->save();

        return redirect()->back()->with('success', 'Username berhasil diperbarui.');
    }

    //keluar
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
