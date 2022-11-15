<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

// class UserExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return User::all();
//     }
// }
class UserExport implements FromView
{
    public function view(): View
    {
        return view('user.export_excel_user', [
            'user' => User::join('detail_user', 'users.id', '=', 'detail_user.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.created_at', 'detail_user.address', 'detail_user.phone', 'detail_user.status')
        ]);
    }
}
