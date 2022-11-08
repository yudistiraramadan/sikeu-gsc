<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => '1',
            'name' => 'Novia Kintan Hapsari',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('tes'),
        ]);
        User::create([
            // 'id' => '2',
            'role_id' => '2',
            'email' => 'pengamat@gmail.com',
            'name' => 'Hidayat Hariawan',
            'password' => Hash::make('tes'),
        ]);
        User::create([
            // 'id' => '3',
            'role_id' => '3',
            'email' => 'yudistira@gmail.com',
            'name' => 'Yudistira Ramadan Kalimasada',
            'password' => Hash::make('tes'),
        ]);
    }
}
