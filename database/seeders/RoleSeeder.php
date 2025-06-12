<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
            ],
            [
                'id' => 2,
                'name' => 'Admin',
            ],
            [
                'id' => 3,
                'name' => 'Banque',
            ],
            [
                'id' => 4,
                'name' => 'AgentTerrain',
            ],
            [
                'id' => 5,
                'name' => 'DG',
            ]
        ]);
    }
}
