<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => '1',
            'role_name' => 'Bendahara',
        ]);
        Role::create([
            'id' => '2',
            'role_name' => 'Pengamat'
        ]);
        Role::create([
            'id' => '3',
            'role_name' => 'Relawan'
        ]);
    }
}
