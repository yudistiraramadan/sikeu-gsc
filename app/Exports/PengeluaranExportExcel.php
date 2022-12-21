<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PengeluaranExportExcel implements FromView
{
    public function view(): View
    {
        return view('pengeluaran.export_excel_pengeluaran', [
        'pengeluaran' => Pengeluaran::all()
        ]);
    }
}
