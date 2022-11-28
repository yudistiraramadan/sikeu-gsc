<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class PemasukanExportExcel implements FromView
{
    public function view(): View
    {
        return view('pemasukan.export_excel_pemasukan', [
            'pemasukan' => Pemasukan::all()
            // ->orderBy('id', 'desc')
        ]);
    }
}
