<?php

use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileAlumniController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\Lowongan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrestasiControllerUser;
use App\Http\Controllers\StatistikController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

//login
Route::get('/login', [AuthController::class, 'showLoginFormAlumni'])->name('login');
Route::post('/login', [AuthController::class, 'loginAlumni'])->name('login.alumni.process');

Route::get('/login/admin', [AuthController::class, 'showLoginFormAdmin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.process');

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('keluar');

// Guest
Route::get('/', [StatistikController::class, 'index']);
Route::get('/dataalumnii', [AlumniController::class, 'showDataAlumnii']);
Route::get('/lowongann', [Lowongan::class, 'showLowonganGuest'])->name('lowonganguest');
Route::get('/detaillowongann/{id}', [Lowongan::class, 'showDetailGuest'])->name('detaillowonganguest');
Route::get('/tentang', function () {
    return view('guest/tentang');
})->name('tentang');

// Alumni
Route::middleware(['auth:alumni'])->group(function () {
    Route::get('/home', [HomeController::class, 'show'])->name('home');
});
Route::get('/chart-data-alumni', [StatistikController::class, 'chartStatistik']);

Route::group(['middleware' => ['auth:alumni']], function () {
    Route::get('/formalumni', [BiodataController::class, 'create'])->name('formalumni');
    Route::post('/formalumnistore', [BiodataController::class, 'store'])->name('formalumni.store');
    Route::get('/editbiodata', [BiodataController::class, 'editbiodata'])->name('editbiodata');
    Route::post('/editbiodataupdate', [BiodataController::class, 'update'])->name('editbiodata.update');
    Route::get('/biodata', [BiodataController::class, 'show'])->name('biodata');
});

Route::get('/dataalumni', [AlumniController::class, 'showDataAlumni'])->name('dataalumni');
Route::get('/lowongan', [Lowongan::class, 'showLowongan'])->name('lowongan');
Route::get('/lowongan/cari', [Lowongan::class, 'filter'])->name('lowongan.cari');
Route::get('/detaillowongan/{id}', [Lowongan::class, 'showDetail'])->name('detaillowongan');

Route::get('/lamaran/{id}', [Lowongan::class, 'lamaran'])->name('lamaran');
Route::get('/cetak', [CetakController::class, 'show'])->name('cetak');
Route::get('/export/alumni/{id}', [BiodataController::class, 'exportToWord'])->name('export.alumnii');

Route::get('/tambahprestasii', [PrestasiController::class, 'createe'])->name('tambahprestasiuser');
Route::get('/prestasii', [PrestasiController::class, 'indexxt'])->name('prestasiuser');
Route::get('/editprestasii/{id}', [PrestasiController::class, 'editt'])->name('editprestasiuser');

Route::group(['middleware' => ['auth:alumni']], function () {
    Route::get('/prestasi/editprestasii/{id}', [PrestasiController::class, 'editt'])->name('editprestasiuser');
    Route::post('/prestasi/tambahh', [PrestasiController::class, 'storee'])->name('prestasiuser.store');
    Route::get('/tambahprestasii', [PrestasiController::class, 'createe'])->name('tambahprestasiuser');
    Route::get('/prestasii', [PrestasiController::class, 'indext'])->name('prestasiuser');
    Route::put('/prestasi/updatee/{id}', [PrestasiController::class, 'updatee'])->name('prestasiuser.update');
});
Route::delete('/dataprestasii/{id}', [PrestasiController::class, 'destroyy'])->name('dataprestasiuser.destroy');

Route::get('/profile', [ProfileAlumniController::class, 'show'])->name('profile');
Route::get('/editpassword', [ProfileAlumniController::class, 'editpassword'])->name('editpassword');
Route::get('/editprofile', [ProfileAlumniController::class, 'editusername'])->name('editprofile');
Route::post('/update-password', [AuthController::class, 'updatePasswordAlumni'])->name('updatePassword');
Route::post('/update-username', [AuthController::class, 'updateUsernameAlumni'])->name('updateUsername');
Route::post('/alumni/updatePhoto', [AlumniController::class, 'updatePhoto'])->name('alumni.updatePhoto');

Route::get('/tentangalumni', function () {
    return view('alumni.tentang');
})->name('tentangalumni');


//Admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [StatistikController::class, 'fitur'])->name('admin.dashboard');
});
Route::get('/chart-data', [StatistikController::class, 'chartStatus']);
Route::get('/chart-jurusan', [StatistikController::class, 'chartJurusan']);
Route::get('/chart-gender', [StatistikController::class, 'chartGender']);
Route::get('/statistik', [StatistikController::class, 'statistik']);

Route::get('/dataalumniadmin', [AlumniController::class, 'showDataAlumniAdmin'])->name('dataalumniadmin');
Route::get('/detailalumni/{id}', [AlumniController::class, 'detail'])->name('detailalumni');
Route::get('/export-alumni', [AlumniController::class, 'exportExcel'])->name('export.alumni');

Route::post('/update-keterangan', [BiodataController::class, 'updateKeterangan'])->name('update.keterangan');
Route::delete('/alumnidata/{id}', [AlumniController::class, 'destroy'])->name('alumnidata.destroy');

Route::get('/datauser', [DataUser::class, 'showData'])->name('datauser');
Route::delete('/datauser/{id}', [DataUser::class, 'destroy'])->name('datauser.destroy');
Route::get('/edituser', [DataUser::class, 'edituser'])->name('edituser');
Route::post('/datauser', [DataUser::class, 'store'])->name('datauser.store');


Route::get('/lowonganadmin', [Lowongan::class, 'showLowonganadmin'])->name('lowonganadmin');
Route::get('/detaillowonganadmin/{id}', [Lowongan::class, 'showDetailadmin'])->name('detaillowonganadmin');
Route::get('/tambahlowongan', [Lowongan::class, 'create'])->name('tambahlowongan');
Route::get('/lowongan/edit/{id}', [Lowongan::class, 'edit'])->name('lowongan.edit');
Route::delete('/lowongandata/{id}', [Lowongan::class, 'destroy'])->name('lowongandata.destroy');

Route::get('/profileadmin', [ProfileAdminController::class, 'show'])->name('profileadmin');
Route::get('/editprofileadmin', [ProfileAdminController::class, 'editusername'])->name('editprofileadmin');
Route::get('/editpasswordadmin', [ProfileAdminController::class, 'editpassword'])->name('editpasswordadmin');
Route::post('/update-password-admin', [AuthController::class, 'updatePasswordAdmin'])->name('updatePasswordAdmin');
Route::post('/update-username-admin', [AuthController::class, 'updateUsernameAdmin'])->name('updateUsernameAdmin');

Route::get('/tambahprestasi', [PrestasiController::class, 'create'])->name('tambahprestasi');
Route::get('/prestasi', [PrestasiController::class, 'indexx'])->name('prestasi');
Route::get('/editprestasi/{id}', [PrestasiController::class, 'edit'])->name('editprestasi');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/prestasi/editprestasi/{id}', [PrestasiController::class, 'edit'])->name('editprestasi');
    Route::post('/prestasi/tambah', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/tambahprestasi', [PrestasiController::class, 'create'])->name('tambahprestasi');
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
    Route::put('/prestasi/update/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
});
Route::delete('/dataprestasi/{id}', [PrestasiController::class, 'destroy'])->name('dataprestasi.destroy');

Route::post('/admin/updatePhoto', [ProfileAdminController::class, 'updatePhoto'])->name('admin.updatePhoto');



//Beranda Alumni
Route::get('/berandaalumni', function () {
    return view('alumni/berandaalumni');
});

Route::get('/alumni', [BiodataController::class, 'side'])->name('alumni');
// Route::get('/alumni', function () {
//     return view('layout/alumniLayout');
// });
