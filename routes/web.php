<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'loginpage'])->name('login');
Route::get('/lupa-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Level : 1,2,3 (Bendahara, Pengamat, Relawan)
Route::group(['middleware' => ['auth', 'ceklevel:1,2,3']], function () {
    Route::get('/dashboard-sample', function () {
        return view('dashboard.sample');
    });
    Route::get('/dashboard-user', [DashboardController::class, 'user_page'])->name('user_page');
});

Route::group(['middleware' => ['auth', 'ceklevel:1,2']], function () {
    // CRUD PEMASUKAN
    Route::get('/daftar-pemasukan', [PemasukanController::class, 'pemasukan'])->name('pemasukan');
    Route::get('/tambah-pemasukan', [PemasukanController::class, 'tambahpemasukan'])->name('tambahpemasukan');
    Route::post('insertpemasukan', [PemasukanController::class, 'insertpemasukan'])->name('insertpemasukan');
    Route::get('/show-pemasukan/{id}', [PemasukanController::class, 'showpemasukan'])->name('showpemasukan');
    Route::post('/edit-pemasukan/{id}', [PemasukanController::class, 'editpemasukan'])->name('editpemasukan');
    Route::post('/delete-pemasukan/destroy', [PemasukanController::class, 'delete'])->name('hapuspemasukan');
    // FEATURE PEMASUKAN
    Route::get('/print-pemasukan/{id}', [PemasukanController::class, 'printpemasukan'])->name('printpemasukan');
    Route::get('/export-excel-pemasukan', [PemasukanController::class, 'export_excel_pemasukan'])->name('export_excel_pemasukan');
    Route::get('export-excel-aktifitas', [PemasukanController::class, 'export_excel_aktifitas'])->name('export_excel_aktifitas_pemasukan');
    Route::get('/export-pdf-pemasukan', [PemasukanController::class, 'export_pdf_pemasukan'])->name('export_pdf_pemasukan');
    Route::get('/export-pdf-aktifitas', [PemasukanController::class, 'export_pdf_aktifitas'])->name('export_pdf_aktifitas_pemasukan');
    Route::get('/aktivitas-pemasukan', [PemasukanController::class, 'activities_pemasukan'])->name('activities_pemasukan');
});

Route::group(['middleware' => ['auth', 'ceklevel:1,2,3']], function()
{
    // CRUD PENGELUARAN
    Route::get('/daftar-pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::get('/tambah-pengeluaran', [PengeluaranController::class, 'tambahpengeluaran'])->name('tambahpengeluaran');
    Route::post('/insert-pengeluaran', [PengeluaranController::class, 'insertpengeluaran'])->name('insertpengeluaran');
    Route::get('/show-pengeluaran/{id}', [PengeluaranController::class, 'showpengeluaran'])->name('showpengeluaran');
    Route::post('/edit-pengeluaran/{id}', [PengeluaranController::class, 'editpengeluaran'])->name('editpengeluaran');
    Route::post('/delete-pengeluaran/destroy', [PengeluaranController::class, 'delete'])->name('hapuspengeluaran');
    // FEATURE PENGELUARAN
    Route::get('/print-pengeluaran/{id}', [PengeluaranController::class, 'printpengeluaran'])->name('printpengeluaran');

    Route::get('/show-signature', [PengeluaranController::class, 'showsignature'])->name('showsignature');
    Route::post('/postsignature', [PengeluaranController::class, 'postsignature'])->name('postsignature');

});



Route::get('/dashboard-relawan', [DashboardController::class, 'relawan_page'])->name('relawan');


Route::get('/daftar-user', [UserController::class, 'user'])->name('user');
Route::get('/tambah-user', [UserController::class, 'tambahuser'])->name('tambahuser');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
Route::get('/show-user/{id}', [UserController::class, 'showuser'])->name('showuser');
Route::post('/edit-user/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::get('/delete-user/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
Route::get('/detail-user/{id}', [UserController::class, 'detailuser'])->name('detailuser');

Route::get('/export_excel_user', [UserController::class, 'export_excel_user'])->name('export_excel_user');
Route::get('/export_pdf_user', [UserController::class, 'export_pdf_user'])->name('export_pdf_user');

Route::get('/aktifitas-user', [UserController::class, 'activities'])->name('activities');

Route::get('/tes', function () {
    return view('layouts.tes');
});
