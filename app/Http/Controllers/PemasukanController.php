<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function pemasukan(Request $request){
        if ($request->ajax()){
            $data = Pemasukan::all();
            return datatables()->of($data)

            ->addColumn('action', function ($data) {

                $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="CETAK" href="#"><i class="fa-solid fa-file-invoice text-info" style="font-size: 30px;"></i></a>';

                $button .= '&nbsp;&nbsp;';
                $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-user/' . $data->id) . '"><i class="fa-solid fa-pen-to-square text-warning" style="font-size: 30px;"></i></a>';

                $button .= '&nbsp;&nbsp;';
                $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="HAPUS" href="delete/' . $data->id . '" class="delete"><i class="fa-solid fa-trash" style="font-size: 28px; color:#FF0063;"></i></a>';



                return $button;
            })->rawColumns(['action'])->make(true);
        }
        return view('pemasukan.daftar-pemasukan');
    }
}
