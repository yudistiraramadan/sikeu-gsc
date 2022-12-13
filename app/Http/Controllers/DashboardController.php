<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function relawan_page(Request $request)
    {
       $aktif = User::join('detail_user', 'users.id', 'detail_user.user_id')->get(['users.*', 'detail_user.*'])->where('status', '=', 'aktif');
       $nonaktif = User::join('detail_user', 'users.id', 'detail_user.user_id')->get(['users.*', 'detail_user.*'])->where('status', '=', 'nonaktif');
       $total_aktif = DetailUser::where('status', '=', 'aktif')->count();
       $total_nonaktif = DetailUser::where('status', '=', 'nonaktif')->count();
       $data = Auth::user();

        $total_data = User::count();
        $pria = DetailUser::where('gender', '=', 'laki-laki')->count();
        $wanita = DetailUser::where('gender', '=', 'perempuan')->count();
        return view('dashboard.relawan', compact('total_data', 'pria', 'wanita', 'data', 'aktif', 'total_aktif', 'nonaktif', 'total_nonaktif'));

         // $status = DetailUser::all()
        // ->where('status', '=', 'aktif');
        $status = DetailUser::count('status')
        ->where('status', '=', 'aktif');
        dd($status);

    }
    public function pemasukan_page()
    {
        $total_pemasukan = Pemasukan::sum('terbilang');
        return view('dashboard.pemasukan', compact('total_pemasukan'));
    }
}
