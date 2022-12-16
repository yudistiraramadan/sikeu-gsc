<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;

use App\Exports\AktifitasPemasukan;
use PDF;
use App\Models\Pemasukan;
use App\Models\LogPemasukan;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemasukanExportExcel;

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

                $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="PRINT KWITANSI" href="' .url('print-pemasukan/' . $data->id) . '"><i class="bi bi-receipt-cutoff text-info" style="font-size: 30px;"></i></a>';

                $button .= '&nbsp;&nbsp;';
                $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-pemasukan/' . $data->id) . '"><i class="bi bi-pencil-square text-warning" style="font-size: 30px;"></i></a>';

                $button .= '&nbsp;&nbsp;';
                $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="HAPUS" href="javascript:void(0)" data-id="' .$data->id. '" class="delete-pemasukan"><i class="bi bi-trash3" style="font-size: 28px; color:#FF0063;"></i></a>';
                
                return $button;
            })->rawColumns(['action', 'time', 'number_format'])->make(true);
        }
        $total_pemasukan = Pemasukan::count();
        return view('pemasukan.daftar-pemasukan', compact('total_pemasukan'));
    }

    public function tambahpemasukan()
    {
        return view('pemasukan.tambah-pemasukan');
    }

    public function activities_pemasukan(Request $request)
    {
        $activities = LogPemasukan::join('pemasukan', 'log_pemasukans.pemasukan_id', '=', 'pemasukan.id')
        ->join('users', 'log_pemasukans.pemasukan_id', '=', 'users.id')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->orderBy('log_pemasukans.id', 'desc')
        ->get(['log_pemasukans.*', 'users.name', 'roles.role_name']);
        // dd($activities);

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
                    return '<p class="badge bg-success">' . $data->type . '<div>';
                } else if ($data->type == 'UPDATE') {
                    return '<p class="badge " style="background-color: #5901C8;">' . $data->type . '<div>';
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
        return view('pemasukan.riwayat-pemasukan');
    }

    public function insertpemasukan(Request $request)
    {
        $this->validate(
            $request,
            [
                'date' => 'required',
                'name' => 'required',
                'keperluan' => 'required',
                'terbilang' => 'required',
                'nominal' => 'required',
            ],
            [
                'date.required' => 'Tanggal masih kosong.',
                'name.required' => 'Nama masih kosong.',
                'keperluan.required' => 'Keperluan masih kosong.',
                'terbilang.required' => 'Terbilang masih kosong.',
                'nominal.required' => 'Nominal masih kosong.',
            ]
        );



        $data = $request->all();
        $pemasukan = new Pemasukan();
        $pemasukan->user_id = auth()->id();
        // $pemasukan->pemasukan_id = auth()->id();
        $pemasukan->name = $data['name'];
        $pemasukan->keperluan = $data['keperluan'];
        $pemasukan->terbilang = $data['terbilang'];
        $pemasukan->nominal = $data['nominal'];
        $pemasukan->date = $data['date'];
        // dd($pemasukan);
        $pemasukan->save();
        LogPemasukan::create([
            'pemasukan_id' => Auth::id(),
            'type' => 'CREATE',
            'activities' => 'Menambah pemasukan '. $pemasukan->name .' untuk '.$pemasukan->keperluan.'',
        ]);
        
        return redirect()->route('pemasukan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function showpemasukan($id)
    {
        $data = Pemasukan::all()->find($id);
        // dd($data);
        return view('pemasukan.tampil-pemasukan', compact('data'));
    }

    public function editpemasukan(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'date' => 'required',
                'name' => 'required',
                'keperluan' => 'required',
                'terbilang' => 'required',
                'nominal' => 'required',
            ],
            [
                'date.required' => 'Tanggal masih kosong.',
                'name.required' => 'Nama masih kosong.',
                'keperluan.required' => 'Keperluan masih kosong.',
                'terbilang.required' => 'Terbilang masih kosong.',
                'nominal.required' => 'Nominal masih kosong.',
            ]
            );

        $data = Pemasukan::findOrFail($id);
        $data->date = $request->date;
        $data->name =$request->name;
        $data->keperluan =$request->keperluan;
        $data->terbilang =$request->terbilang;
        $data->nominal =$request->nominal;
        $data->save();
        LogPemasukan::create([
            'pemasukan_id' => Auth::id(),
            'type' => 'UPDATE',
            'activities' => 'Mengedit pemasukan '. $data->name .' untuk '.$data->keperluan.'',
        ]);
        return redirect()->route('pemasukan')->with('success', 'Data berhasil diedit');
    }

    public function delete(Request $request)
    {
        $data = Pemasukan::find($request->get('id'));
        LogPemasukan::create([
            'pemasukan_id' => Auth::id(),
            'type' => 'DELETE',
            'activities' => 'Menghapus pemasukan '. $data->name .' untuk '.$data->keperluan.'',
        ]);
        $data->delete();
        return redirect()->route('pemasukan')->with('success', 'Pemaasukan berhasil dihapus');
    }



    public function printpemasukan($id)
    {
        $data = Pemasukan::find($id);
        view()->share('data', $data);

        $pdf = PDF::loadview('pemasukan.print-pemasukan');
        return $pdf->download('pemasukan.pdf');
        // return redirect()->route('pemasukan')->with('success', 'Data Berhasil Diprint');
    }

    public function export_excel_pemasukan()
    {
        return Excel::download(new PemasukanExportExcel, 'daftar_pemasukan.xlsx');
    }

    public function export_excel_aktifitas()
    {
        return Excel::download(new AktifitasPemasukan, 'aktifitas_pemasukan.xlsx');
    }

    public function export_pdf_pemasukan()
    {
        $data = Pemasukan::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('pemasukan.print-daftar-pemasukan');
        return $pdf->download('daftar-pemasukan.pdf');
    }

    public function export_pdf_aktifitas()
    {
        $data = LogPemasukan::join('users', 'log_pemasukans.user_id', '=', 'users.id')
                ->get(['log_pemasukans.*', 'users.name']);
        view()->share('data', $data);
        $pdf = PDF::loadView('pemasukan.print-aktifitas-pemasukan');
        return $pdf->download('aktifitas_pemasukan.pdf');
    }
    
}
