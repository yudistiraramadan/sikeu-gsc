<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
                ->select(['users.id', 'users.name', 'users.email', 'users.created_at', 'detail_user.address', 'detail_user.phone', 'detail_user.status']);
            return datatables()->of($data)
                ->addColumn('action', function ($data) {

                    $button = '<a data-toogle="tooltip" data-placement="top" title="Detail User" href=""><button type="button" class="btn btn-info"><i class="bi bi-info-circle"></i></button></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" title="Edit" href="' . url('show-user/' . $data->id) . '"><button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" title="Hapus" href="#"><button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button></a>';


                    return $button;
                })->rawColumns(['action'])->make(true);
            return DataTables::of($data)
                ->make(true);
        }
        return view('user.daftar-user');
    }

    public function tambahuser()
    {
        return view('user.tambah-user');
    }

    public function insertuser(Request $request)
    {
        $data = $request->all();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = $data['role_id'];
        $user->save();

        $detail_user = new DetailUser;
        $detail_user->user_id = $user->id;
        $detail_user->photo = $data['photo'];
        $detail_user->address = $data['address'];
        $detail_user->phone = $data['phone'];
        $detail_user->status = $data['status'];
        $detail_user->gender = $data['gender'];
        $detail_user->save();

        return redirect('daftar-user');
    }

    public function showuser($id){
        $user = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
            ->get(['users.*', 'detail_user.*'])
            ->find($id);
        // dd($user);
        return view('user.tampil-user', compact('user'));
    }

}
