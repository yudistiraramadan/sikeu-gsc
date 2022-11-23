<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function relawan_page()
    {
       $data = Auth::user();

        $total_data = User::count();
        $pria = DetailUser::where('gender', '=', 'laki-laki')->count();
        $wanita = DetailUser::where('gender', '=', 'perempuan')->count();
        return view('dashboard.relawan', compact('total_data', 'pria', 'wanita', 'data'));

         // $status = DetailUser::all()
        // ->where('status', '=', 'aktif');
        $status = DetailUser::count('status')
        ->where('status', '=', 'aktif');
        dd($status);

        
    }

    public function user_page()
    {
        $user = User::all();
        $user = Auth::user();
        // dd($user);
        return view('dashboard.user', compact('user'));
    }
}
