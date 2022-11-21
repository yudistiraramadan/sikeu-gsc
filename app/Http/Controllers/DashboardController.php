<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
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
    }

    public function user_page()
    {
        $user = User::all();
        $user = Auth::user();
        // dd($user);
        return view('dashboard.user', compact('user'));
    }
}
