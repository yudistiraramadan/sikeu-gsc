<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginpage()
    {
        return view('authentication.login');
    }

    public function forgot_password()
    {
        return view('authentication.forgot-password');
    }
    public function postlogin(Request $request)
    {
        // // Membuat Validasi
        // $validate = Validator::make($request->all(), [
        //     'email' => 'required|email:dns',
        //     'password' => 'required',
        // ]);

        // // menangkap format email salah
        // if($validate->fails())
        // {
        //     return back()->with('error', 'Email yang anda masukan tidak valid');
        // } else{
        //     // password salah/tidak sama
        //     $credentials = request(['email', 'password']);
        //     if(!Auth::attempt($credentials))
        //     {
        //         $respon = [
        //             'status' => 'error',
        //             'msg' => 'Unauthorized',
        //             'errors' => null,
        //             'content' => null,
        //         ];
        //         return back()->with('error', 'Email atau Password yang anda masukkan salah!');
        //     }
        // }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::all();
            $user = Auth::user();
            return redirect('/dashboard-sample')->with('toast_success', 'Selamat Datang '.$user->name. ' :)');
        }
        return redirect('/')->with('toast_error', 'Email atau password salah');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('toast_success', 'Anda berhasil logout :)');
    }
}
