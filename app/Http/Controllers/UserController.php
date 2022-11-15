<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function user(Request $request)
    {
        if ($request->ajax()) {
            $data = User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
                ->select(['users.id', 'users.name', 'users.email', 'users.created_at', 'detail_user.address', 'detail_user.phone', 'detail_user.status', 'detail_user.photo']);
            return datatables()->of($data)

                //  Merubah format waktu menjadi (1 day ago)
                // ->addColumn('time', function ($data) {
                //     return Carbon::parse($data->created_at)->diffForHumans();
                // })

                ->addColumn('time', function ($data) {
                    return Carbon::parse($data->date)->isoFormat('dddd, D MMMM Y');
                })
                ->addColumn('photo', function ($data) {
                    // $photo =  `<img src = "{{asset(foto-relawan/'.$data->photo.')}}">`;
                    //  return `<img src = "{{asset("foto-relawan/yudis.JPG")}}" style="width: 50px; height:50px;">`;
                    $photo = '<img src="foto-relawan/' . $data->photo . '" style="width: 50px; height:50px;">';
                    return $photo;
                })

                ->addColumn('action', function ($data) {

                    $button = '<a data-toogle="tooltip" data-placement="top" name="detail" title="DETAIL" href="#"><i class="fa-solid fa-user-pen text-info" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="edit" title="EDIT" href="' . url('show-user/' . $data->id) . '"><i class="fa-solid fa-pen-to-square text-warning" style="font-size: 30px;"></i></a>';

                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-toogle="tooltip" data-placement="top" name="delete-user" title="HAPUS" href="delete/' . $data->id . '" class="delete"><i class="fa-solid fa-trash" style="font-size: 28px; color:#FF0063;"></i></a>';



                    return $button;
                })->rawColumns(['action', 'time', 'photo'])->make(true);
            // return DataTables::of($data)->make(true);
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
        $detail_user->photo = $data['photo'];

        if ($request->hasFile('photo')) {
            $request->file('photo')->move('foto-relawan/', $request->file('photo')->getClientOriginalName());
            $detail_user->photo = $request->file('photo')->getClientOriginalName();
            // $detail_user->save();
        }
        $detail_user->save();

        return redirect('daftar-user');
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

        return redirect()->route('user')->with('toast_success', 'Data User Berhasi Diedit');
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user');
    }

    public function exportexcel()
    {
        return Excel::download(new UserExport, 'datarelawan.xlsx');
    }
}
