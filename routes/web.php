<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;

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
    Route::get('/delete-pemasukan/{id}', [PemasukanController::class, 'deletepemasukan'])->name('deletepemasukan');
    Route::get('/export_excel_pemasukan', [UserController::class, 'export_excel_pemasukan'])->name('export_excel_pemasukan');
});


Route::get('/dashboard-relawan', [DashboardController::class, 'relawan_page'])->name('relawan');


Route::get('/daftar-user', [UserController::class, 'user'])->name('user');
Route::get('/tambah-user', [UserController::class, 'tambahuser'])->name('tambahuser');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
Route::get('/show-user/{id}', [UserController::class, 'showuser'])->name('showuser');
Route::post('/edit-user/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::get('/delete-user/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

Route::get('/export_excel_user', [UserController::class, 'export_excel_user'])->name('export_excel_user');
Route::get('/tes', function () {
    return view('pemasukan.terbilang');
});
