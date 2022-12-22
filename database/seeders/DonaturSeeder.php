<?php

namespace Database\Seeders;

use App\Models\Donatur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donatur::create([
            'user_id' => '1',
            'date' => '2022-12-20',
            'name' => 'Hamba Allah',
            'email' => 'tes@gmail.com',
            'phone' => '085228409840',
            'address' => 'Jalan Sulawesi Perum Puri Tanjung Intan No.B2 Gunungsimping',
            'job' => 'Mahasiswa',
            'photo' => 'yudis.jpg',
            'gender' => 'laki-laki',
            'type' => 'premium',
            'status' => 'aktif',
        ]);
    }
}
