<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'role_id' => 1,
                'name' => 'Super Admin',
                'email' => 'super@gmail.com',
                'username' => 'super@gmail.com',
                'password' => Hash::make(1234)
            ],
            [
                'id' => 2,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin@gmail.com',
                'password' => Hash::make(1234)
            ],
            [
                'id' => 3,
                'role_id' => 4,
                'name' => 'AgentTerrain',
                'email' => 'agent@gmail.com',
                'username' => 'agent@gmail.com',
                'password' => Hash::make(1234)
            ],
            [
                'id' => 4,
                'role_id' => 5,
                'name' => 'AgentTerrain',
                'email' => 'caissier@gmail.com',
                'username' => 'caissier@gmail.com',
                'password' => Hash::make(1234)
            ]
        ]);
    }
}
