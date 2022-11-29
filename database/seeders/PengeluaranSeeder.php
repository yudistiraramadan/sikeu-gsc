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
            'name' => 'HAMBA ALLAH',
            'address' => 'JALAN DAHLIA GANG 2 NO.70.A RT 03 RW 12 PELUTAN PEMALANG',
            'nominal' => '500000',
            'terbilang' => 'LIMA RATUS RIBU RUPIAH',
            'keterangan' => 'PENTASYARUFAN DHUAFA',
            'date' => '2022-11-29',
            'signature' => 'ttd.jpg',
        ]);
    }
}
