<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemasukan;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $total_pemasukan_tahun = DB::select('SELECT YEAR(date) as year, SUM(terbilang) as total FROM pemasukan GROUP BY YEAR(date)');
        dd($total_pemasukan_tahun);

        return view('dashboard.pemasukan', compact('total_pemasukan', 'total_pemasukan_tahun'));

        
        // DB::select('SELECT YEAR(created_at) as year, SUM(amount) as total FROM homestead.projects GROUP BY YEAR(created_at)');
    }
}
