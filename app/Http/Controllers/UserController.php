<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Role;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use App\Models\LogUser;
use App\Models\DetailUser;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;



class UserController extends Controller
{
    public function user(Request $request)
    {
        $data = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')->get(['users.id','users.name', 'detail_user.address', 'detail_user.phone', 'detail_user.status', 'detail_user.created_at']);
        if ($request->ajax()) {
            // $data = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
            //     ->select(['users.id', 'users.name', 'users.email', 'users.created_at', 'detail_user.address', 'detail_user.phone', 'detail_user.status', 'detail_user.photo']);
            return datatables()->of($data)

                //  Merubah format waktu menjadi (1 day ago)
                // ->addColumn('time', function ($data) {
                //     return Carbon::parse($data->created_at)->diffForHumans();
                // })

                ->addColumn('time', function ($data) {
                    return Carbon::parse($data->created_at)->isoFormat('D MMMM Y');
                })
                ->addColumn('photo', function ($data) {
                    // $photo =  `<img src = "{{asset(foto-relawan/'.$data->photo.')}}">`;
                    //  return `<img src = "{{asset("foto-relawan/yudis.JPG")}}" style="width: 50px; height:50px;">`;
                    $photo = '<img src="foto-relawan/' . $data->photo . '" style="width: 50px; height:50px;">';
                    return $photo;
                })

                ->addColumn('action', function ($data) {
                    $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="DETAIL" href="' . url('detail-user/'. $data->id).'"><i class="bi bi-person-bounding-box text-info" style="font-size: 30px;"></i></a>';
                    // $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="PRINT KWITANSI" href="' . url('print-pengeluaran/' . $data->id) . '"><i class="bi bi-receipt-cutoff text-info" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-user/' . $data->id) . '"><i class="bi bi-pencil-square text-warning" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="delete-user" title="HAPUS" href="delete-user/' . $data->id . '" class="delete"><i class="bi bi-trash3" style="font-size: 28px; color:#FF0063;"></i></a>';



                    return $button;
                })->rawColumns(['action', 'time', 'photo'])->make(true);
            // return DataTables::of($data)->make(true);
        }
        
        $total_user = User::count();
        return view('user.daftar-user', compact('total_user'));
    }

    public function tambahuser()
    {
        return view('user.tambah-user');
    }

    public function activities(Request $request)
    {
        $activities = LogUser::join('users', 'log_users.user_id', '=', 'users.id')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->orderBy('log_users.id', 'desc')
        ->get(['log_users.*', 'users.name', 'roles.role_name']);

        if ($request->ajax()) 
        {
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
        return view('user.riwayat-user');
    }

    public function insertuser(Request $request)
    {
        $this->validate(
            $request, 
            [
                'name' => 'required|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                // 'password_confirmation' => 'required_with:password|same:password',
                'phone' => 'required',
                'role_id' => 'required',
                'gender' => 'required',
                'status' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Nama relawan masih kosong',
                'name.unique' => 'Relawan sudah terdaftar',
                'email.required' => 'Email masih kosong',
                'email.unique' => 'Email relawan sudah ada',
                'password.required' => 'Password masih kosong',
                // 'password_confirmation.same' => 'Password tidak sama',
                'phone.required' => 'No Hp/Whatsapp masih kosong',
                'role_id.required' => 'Tipe relawan masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
                'status.required' => 'Status masih kosong',
                'address.required' => 'Alamat masih kosong',
            ]
        );

        $data = $request->all();
        // dd($data);

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = $data['role_id'];
        $user->save();

        $detail_user = new DetailUser;
        $detail_user->user_id = $user->id;
        // $detail_user->photo = $data['photo'];
        $detail_user->address = $data['address'];
        $detail_user->phone = $data['phone'];
        $detail_user->status = $data['status'];
        $detail_user->gender = $data['gender'];
        // $detail_user->photo = $data['photo'];

        if ($request->hasFile('photo')) {
            $request->file('photo')->move('foto-relawan/', $request->file('photo')->getClientOriginalName());
            $detail_user->photo = $request->file('photo')->getClientOriginalName();
            // $detail_user->save();
        }
        $detail_user->save();
        LogUser::create([
            'user_id' => Auth::id(),
            'type' => 'CREATE',
            'activities' => 'Menambah relawan <b>' .$user->name.'</b>',
        ]);
        

        return redirect()->route('user')->with('success', 'Data Relawan Berhasil Ditambahkan');
        
    }

    public function showuser($id)
    {
        $user = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
            ->get(['users.*', 'detail_user.*'])
            ->find($id);
        // dd($user);
        return view('user.tampil-user', compact('user'));
    }


    public function edituser(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                // 'password_confirmation' => 'required_with:password|same:password',
                'phone' => 'required',
                'role_id' => 'required',
                'gender' => 'required',
                'status' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Nama relawan masih kosong',
                // 'name.unique' => 'Relawan sudah terdaftar',
                'email.required' => 'Email masih kosong',
                'password.required' => 'Password masih kosong',
                // 'password_confirmation.same' => 'Password tidak sama',
                'phone.required' => 'No Hp/Whatsapp masih kosong',
                'role_id.required' => 'Tipe relawan masih kosong',
                'gender.required' => 'Jenis kelamin masih kosong',
                'status.required' => 'Status masih kosong',
                'address.required' => 'Alamat masih kosong',
            ]
            );

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($user['password']);

        $user->save();

        $detail_user = DetailUser::findOrFail($id);
        $detail_user->phone = $request->phone;
        $detail_user->gender = $request->gender;
        $detail_user->address = $request->address;
        $detail_user->status = $request->status;
        // dd($detail_user);
        $detail_user->save();
        LogUser::create([
            'user_id' => Auth::id(),
            'type' => 'UPDATE',
            'activities' => 'Mengedit relawan <b>' .$user->name. '</b>',
        ]);

        return redirect()->route('user')->with('success', 'Data User Berhasi Diedit');
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        LogUser::create([
            'user_id' => Auth::id(),
            'type' => 'DELETE',
            'activities' => 'Menghapus relawan <b>'. $data->name .'</b>',
        ]);
        $data->delete();
        return redirect()->route('user')->with('success', 'Data User Berhasil Dihapus');
    }

    public function detailuser($id)
    {
        // $role = Role::find($id);
        $user = User::find($id);
        $detail_user = DetailUser::find($id);
        return view('user.detail-user', compact('user','detail_user'));
    }

    public function export_excel_user()
    {
        return Excel::download(new UserExport, 'data_relawan.xlsx');
    }

    public function export_pdf_user()
    {
        $data = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
        ->get(['users.id','users.name', 'detail_user.address', 'detail_user.phone', 'detail_user.status', 'detail_user.created_at']);
        // $data = User::all();
        // dd($data);

        view()->share('data', $data);
        $pdf = PDF::loadview('user.print-daftar-user');
        return $pdf->download('daftar-relawan.pdf');


    }
}
