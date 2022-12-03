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

    public function tambahpengeluaran()
    {
        return view('pengeluaran.tambah-pengeluaran');
    }

    public function insertpengeluaran(Request $request)
    {
        $this->validate(
            $request,
            [
                'date' => 'required',
                'name_pengaju' => 'required',
                'name_penerima' => 'required',
                'address' => 'required',
                'nominal' => 'required',
                'terbilang' => 'required',
                'keterangan' => 'required',
            ],
            [
                'date.required' => 'Tanggal masih kosong.',
                'name_pengaju.required' => 'Nama pengaju masih kosong.',
                'name_penerima.required' => 'Nama penerima masih kosong.',
                'address.required' => 'Alamat masih kosong.',
                'nominal.required' => 'Nominal masih kosong.',
                'terbilang.required' => 'Terbilang masih kosong.',
                'keterangan.required' => 'Keterangan masih kosong.',
            ]
            );


        $data = $request->all();
        $pengeluaran = new Pengeluaran();
        $pengeluaran->user_id = auth()->id();
        $pengeluaran->name_pengaju = $data['name_pengaju'];
        $pengeluaran->name_penerima = $data['name_penerima'];
        $pengeluaran->address = $data['address'];
        $pengeluaran->nominal = $data['nominal'];
        $pengeluaran->terbilang = $data['terbilang'];
        $pengeluaran->keterangan = $data['keterangan'];
        $pengeluaran->date = $data['date'];
        // $pengeluaran->signature = $data['signature'];
        $pengeluaran->save();
        return redirect()->route('pengeluaran')->with('success', 'Pengeluaran berhasil ditambahkan');
    }
}
