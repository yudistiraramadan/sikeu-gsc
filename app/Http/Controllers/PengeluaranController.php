<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengeluaran::all();
            return datatables()->of($data)

                ->addColumn('number_format', function ($data) {
                    return  number_format($data->nominal, 0, ',', '.');
                })
                ->addColumn('time', function ($data) {
                    return Carbon::parse($data->date)->isoFormat('D MMMM Y');
                })
                ->addColumn('action', function ($data) {

                    $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="PRINT KWITANSI" href="' . url('print-pemasukan/' . $data->id) . '"><i class="fa-solid fa-file-invoice text-info" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-pemasukan/' . $data->id) . '"><i class="fa-solid fa-pen-to-square text-warning" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="HAPUS" href="javascript:void(0)" data-id="' . $data->id . '" class="delete-pemasukan"><i class="fa-solid fa-trash" style="font-size: 28px; color:#FF0063;"></i></a>';
                    return $button;
                })->rawColumns(['action', 'time', 'number_format'])->make(true);
        }
        return view('pengeluaran.daftar-pengeluaran');
    }
}
