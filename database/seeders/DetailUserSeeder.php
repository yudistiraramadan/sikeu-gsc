<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailUser::create([
            'user_id' => '1',
            'photo' => 'photo.jpg',
            'address' => 'Jalan Laban RT 03 RW 12 Cilacap Utara, 52311',
            'phone' => '085229202932',
            'gender' => 'perempuan',
            'status' => 'aktif',
        ]);
        DetailUser::create([
            'user_id' => '2',
            'photo' => 'relawan.jpg',
            'address' => 'Jalan Kalimantan RT 01 RW 02 Cilacap Utara, 56112',
            'phone' => '089565547825',
            'gender' => 'laki-laki',
            'status' => 'nonaktif',
        ]);
        DetailUser::create([
            'user_id' => '3',
            'photo' => 'yudis.jpg',
            'address' => 'Jalan Dahlia RT 03 RW 12 Pelutan Pemalang, 52311',
            'phone' => '085228409840',
            'gender' => 'perempuan',
            'status' => 'aktif',
        ]);
    }
}
