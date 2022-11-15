<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use App\Models\Pemasukan;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PemasukanController extends Controller
{
    public function pemasukan(Request $request){
        if ($request->ajax()){
            $data = Pemasukan::all();
            return datatables()->of($data)

            // ->addColumn('time', function ($data) {
            //     return Carbon::now()->isoFormat('D MMMM Y');
            // })
            ->addColumn('number_format', function($data){
                return  number_format ($data->terbilang,0,',','.');
            })
            ->addColumn('time', function ($data) {
                    return Carbon::parse($data->date)->isoFormat('D MMMM Y');
                })
            ->addColumn('action', function ($data) {

                $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="CETAK" href="' .url('print-pemasukan/' . $data->id) . '"><i class="fa-solid fa-file-invoice text-info" style="font-size: 30px;"></i></a>';

                $button .= '&nbsp;&nbsp;';
                $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-user/' . $data->id) . '"><i class="fa-solid fa-pen-to-square text-warning" style="font-size: 30px;"></i></a>';

                $button .= '&nbsp;&nbsp;';
                $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="HAPUS" href="delete-pemasukan/' . $data->id . '" class="delete"><i class="fa-solid fa-trash" style="font-size: 28px; color:#FF0063;"></i></a>';



                return $button;
            })->rawColumns(['action', 'time', 'number_format'])->make(true);
        }
        return view('pemasukan.daftar-pemasukan');
    }

    public function tambahpemasukan()
    {
        return view('pemasukan.tambah-pemasukan');
    }

    public function insertpemasukan(Request $request)
    {
        $data = $request->all();
        $pemasukan = new Pemasukan();
        $pemasukan->user_id = auth()->id();
        $pemasukan->name = $data['name'];
        $pemasukan->keperluan = $data['keperluan'];
        $pemasukan->terbilang = $data['terbilang'];
        $pemasukan->nominal = $data['nominal'];
        $pemasukan->date = $data['date'];
        // dd($pemasukan);
        $pemasukan->save();
        return redirect()->route('pemasukan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function deletepemasukan($id)
    {
        $data = Pemasukan::find($id);
        $data->delete();
        return redirect()->route('pemasukan')->with('success', 'Data Berhasil Dihapus');
    }



    public function printpemasukan($id)
    {
        $data = Pemasukan::find($id);
        view()->share('data', $data);

        $pdf = PDF::loadView('pemasukan.print-pemasukan');
        return $pdf->download('pemasukan.pdf');
        // return redirect()->route('pemasukan')->with('success', 'Data Berhasil Diprint');
    }
}
