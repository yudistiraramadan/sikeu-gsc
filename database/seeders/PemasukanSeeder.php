<?php

namespace Database\Seeders;

use App\Models\Pemasukan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemasukan::create([
            'id' => '1',
            'user_id' => '1',
            'name' =>  'NOVIA KINTAN HAPSARI',
            'nominal' => 'DUA RATUS RIBU RUPIAH',
            'keperluan' => 'BELI SEMEN 2 SAK',
            'date' => '2022-11-10',
            'terbilang' => '200000',
        ]);
    }
}
