<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;

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
    Route::get('/daftar-pemasukan', [PemasukanController::class, 'pemasukan'])->name('pemasukan');
    Route::get('/tambah-pemasukan', [PemasukanController::class, 'tambahpemasukan'])->name('tambahpemasukan');
    Route::post('insertpemasukan', [PemasukanController::class, 'insertpemasukan'])->name('insertpemasukan');
    Route::get('/show-pemasukan/{id}', [PemasukanController::class, 'showpemasukan'])->name('showpemasukan');
    Route::post('/edit-pemasukan/{id}', [PemasukanController::class, 'editpemasukan'])->name('editpemasukan');

    Route::get('/print-pemasukan/{id}', [PemasukanController::class, 'printpemasukan'])->name('printpemasukan');
    // Route::get('/delete-pemasukan/{id}', [PemasukanController::class, 'deletepemasukan'])->name('deletepemasukan');
    Route::post('/delete-pemasukan/destroy', [PemasukanController::class, 'delete'])->name('hapuspemasukan');
    Route::get('/export-excel-pemasukan', [PemasukanController::class, 'export_excel_pemasukan'])->name('export_excel_pemasukan');
    Route::get('export-excel-aktifitas', [PemasukanController::class, 'export_excel_aktifitas'])->name('export_excel_aktifitas_pemasukan');
    Route::get('/export-pdf-pemasukan', [PemasukanController::class, 'export_pdf_pemasukan'])->name('export_pdf_pemasukan');
    Route::get('/export-pdf-aktifitas', [PemasukanController::class, 'export_pdf_aktifitas'])->name('export_pdf_aktifitas_pemasukan');

    Route::get('/aktivitas-pemasukan', [PemasukanController::class, 'activities_pemasukan'])->name('activities_pemasukan');
});

Route::get('daftar-pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');


Route::get('/dashboard-relawan', [DashboardController::class, 'relawan_page'])->name('relawan');


Route::get('/daftar-user', [UserController::class, 'user'])->name('user');
Route::get('/tambah-user', [UserController::class, 'tambahuser'])->name('tambahuser');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
Route::get('/show-user/{id}', [UserController::class, 'showuser'])->name('showuser');
Route::post('/edit-user/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::get('/delete-user/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

Route::get('/export_excel_user', [UserController::class, 'export_excel_user'])->name('export_excel_user');
Route::get('/export_pdf_user', [UserController::class, 'export_pdf_user'])->name('export_pdf_user');

Route::get('/aktifitas-user', [UserController::class, 'activities'])->name('activities');

Route::get('/tes', function () {
    return view('pengeluaran.print-pengeluaran');
});
