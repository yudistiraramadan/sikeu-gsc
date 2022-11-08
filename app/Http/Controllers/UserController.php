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
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="Hapus" href="delete/'.$data->id.'" class="delete"><button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button></a>';
                    // $button .= '<a data-toogle="tooltip" data-placement="top" name="delete" title="Hapus" href="' . $data->id . '" class="delete" id="' . $data->id . '"><i class="bi bi-trash3-fill" style="font-size: 24px;"></i></a>';



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


    public function edituser(Request $request, $id)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'nama' => 'required',
        //         'email' => 'required',
        //         'alamat' => 'required',
        //         'tlpn' => 'required',
        //         'jk' => 'required',
        //         'status' => 'required',
        //     ],
        //     [
        //         'nama.required' => 'Nama admin masih kosong.',
        //         'email.required' => 'Email admin masih kosong.',
        //         'alamat.required' => 'Alamat admin masih kosong.',
        //         'tlpn.required' => 'tlpn admin masih kosong.',
        //         'jk.required' => 'jk admin masih kosong.',
        //         'jk.required' => 'jk admin masih kosong.',
        //     ]
        // );
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        $user = DetailUser::findOrFail($id);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->status = $request->status;
        // dd($user);
        $user->save();

        return redirect()->route('index')->with('toast_success', 'Data User Berhasi Diedit');
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('index');
    }



}
