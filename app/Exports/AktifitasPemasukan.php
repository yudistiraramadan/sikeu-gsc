<?php

namespace App\Exports;

use App\Models\LogPemasukan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class AktifitasPemasukan implements FromView
{
    public function view(): View
    {
        return view('pemasukan.export_excel_aktifitas', [
            'aktifitas' => LogPemasukan::join('users', 'log_pemasukans.user_id', '=', 'users.id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->orderBy('log_pemasukans.id', 'desc')
            ->get(['log_pemasukans.*', 'users.name', 'roles.role_name'])
        ]);
    }
}
