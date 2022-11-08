<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar-user', [UserController::class, 'index'])->name('index');
Route::get('/tambah-user', [UserController::class, 'tambahuser'])->name('tambahuser');
Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
Route::get('/show-user/{id}', [UserController::class, 'showuser'])->name('showuser');
Route::post('/edit-user/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');




