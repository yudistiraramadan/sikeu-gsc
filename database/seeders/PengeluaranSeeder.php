<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengeluaran::create([
            'id' => '1',
            'user_id' => '1',
            'name_pengaju' => '	Yudistira Ramadan Kalimasada',
            'name_penerima' => 'Hamba Allah',
            'address' => '	Jalan Dahlia Gang 2 No 70.A RT 03 RW 12',
            'nominal' => '500000',
            'terbilang' => 'LIMA RATUS RIBU RUPIAH',
            'keterangan' => 'Pentasyarufan Dhuafa',
            'date' => '2022-11-29',
            'signature' => 'ttd.jpg',
        ]);
    }
}
