<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


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
}
