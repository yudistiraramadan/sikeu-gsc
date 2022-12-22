<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\LogPengeluaran;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengeluaranExportExcel;

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

                    $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="PRINT KWITANSI" href="' . url('print-pengeluaran/' . $data->id) . '"><i class="bi bi-receipt-cutoff text-info" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-pengeluaran/' . $data->id) . '"><i class="bi bi-pencil-square text-warning" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="HAPUS" href="javascript:void(0)" data-id="' . $data->id . '" class="delete-pengeluaran"><i class="bi bi-trash3" style="font-size: 28px; color:#FF0063;"></i></a>';
                    return $button;
                })->rawColumns(['action', 'time', 'number_format'])->make(true);
        }
        $total_pengeluaran = Pengeluaran::count();
        // dd($total_pengeluaran);
        return view('pengeluaran.daftar-pengeluaran', compact('total_pengeluaran'));
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
        // $pengeluaran->signature = $data['signature'];'
        LogPengeluaran::create([
            'user_id' => Auth::id(),
            'type' => 'CREATE',
            'activities' => 'Menambah pengeluaran '. $pengeluaran->name_pengaju .' untuk '.$pengeluaran->keterangan.'',
        ]);
        $pengeluaran->save();
        return redirect()->route('pengeluaran')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function showpengeluaran($id)
    {
        $data = Pengeluaran::all()->find($id);
        return view('pengeluaran.tampil-pengeluaran', compact('data'));
    }

    public function editpengeluaran(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'date' => 'required',
                'name_pengaju' => 'required',
                'name_penerima' => 'required',
                'address' => 'required',
                'keterangan' => 'required',
                'nominal' => 'required',
                'terbilang' => 'required',
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

            $data = Pengeluaran::findOrFail($id);
            $data->date = $request->date;
            $data->name_pengaju = $request->name_pengaju;
            $data->name_penerima = $request->name_penerima;
            $data->address = $request->address;
            $data->keterangan = $request->keterangan;
            $data->nominal = $request->nominal;
            $data->terbilang = $request->terbilang;

            LogPengeluaran::create([
                'user_id' => Auth::id(),
                'type' => 'UPDATE',
                'activities' => 'Mengedit pengeluaran '. $data->name_pengaju .' untuk '.$data->keterangan.'',
            ]);
            $data->save();
            return redirect()->route('pengeluaran')->with('success', 'Pengeluaran berhasil diedit.');
    }

    public function delete(Request $request)
    {
        $data = Pengeluaran::find($request->id);
        LogPengeluaran::create([
            'user_id' => Auth::id(),
            'type' => 'DELETE',
            'activities' => 'Menghapus pengeluaran '. $data->name_pengaju .' untuk '.$data->keterangan.'',
        ]);
        $data->delete();
    }

    public function printpengeluaran($id)
    {
        $data = Pengeluaran::find($id);
        view()->share('data',$data);
        $pdf = PDF::loadview('pengeluaran.print-pengeluaran');
        return $pdf->download('pengeluaran.pdf');
    }

    public function export_excel_pengeluaran()
    {
        return Excel::download(new PengeluaranExportExcel, 'daftar_pengeluaran.xlsx');
    }

    public function export_pdf_pengeluaran()
    {
        $data = Pengeluaran::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('pengeluaran.print-daftar-pengeluaran');
        return $pdf->download('daftar-pengeluaran.pdf');
    }

    public function activities_pengeluaran(Request $request)
    {
        $activities = LogPengeluaran::join('users', 'log_pengeluaran.user_id', '=', 'users.id')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->orderBy('log_pengeluaran.id', 'desc')
        ->get(['log_pengeluaran.*', 'users.name', 'roles.role_name']);

        if ($request->ajax()){
            return datatables()->of($activities)
            ->addColumn('role', function($data){
                return '<p class="badge" style="background-color: #5901C8;">' . $data->role_name . '<div>';
            })
            ->addColumn('user_name', function($data){
                return $data->name;
            })
            ->addColumn('information', function ($data){
                return $data->activities;
            })
            ->addColumn('status_action', function ($data){
                if ($data->type == 'DELETE') {
                    return '<p class="badge bg-danger">' . $data->type . '<div>';
                } else if ($data->type == 'CREATE') {
                    return '<p class="badge" style="background-color:#54B435;">' . $data->type . '<div>';
                } else if ($data->type == 'UPDATE') {
                    return '<p class="badge " style="background-color: #F49D1A;">' . $data->type . '<div>';
                } else {
                    return '<p class="badge " style="background-color: #607EAA;">' . $data->type . '<div>';
                }
            })
            ->addColumn('date_activity', function ($data){
                return Carbon::parse($data->created_at)->diffForHumans();
            })
            ->rawColumns(['role', 'user_name', 'information', 'status_action', 'date_activity'])
            ->make(true);
        }
        return view('pengeluaran.riwayat-pengeluaran');
    }



    public function showsignature()
    {
        return view('pengeluaran.signature');
    }
}
