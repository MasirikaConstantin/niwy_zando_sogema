<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypePavillonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_pavilons')->insert([
            [
                'id' => 1,
                'nom' => 'Simple',

            ],
            [
                'id' => 2,
                'nom' => 'Multiple',
            ]
        ]);

        DB::table('pavillons')->insert([
            [
                'id' => 1,
                'numero' => 'BOLINGO',
                'niveau' => 0,
            ],
            [
                'id' => 2,
                'numero' => 'BOLINGO',
                'niveau' => 1,
            ],
            [
                'id' => 3,
                'numero' => 'BOLINGO',
                'niveau' => 2,
            ],
            [
                'id' => 4,
                'numero' => 'BOLINGO',
                'niveau' => 3,
            ],
            [
                'id' => 5,
                'numero' => 'ECOLE',
                'niveau' => 0,
            ],
            [
                'id' => 6,
                'numero' => 'ECOLE',
                'niveau' => 1,
            ],
            [
                'id' => 7,
                'numero' => 'ECOLE',
                'niveau' => 2,
            ],
            [
                'id' => 8,
                'numero' => 'ECOLE',
                'niveau' => 3,
            ],
            [
                'id' => 9,
                'numero' => 'ECOLE / RUAKANDINGI',
                'niveau' => 0,
            ],
            [
                'id' => 10,
                'numero' => 'ECOLE / RUAKANDINGI',
                'niveau' => 1,
            ],
            [
                'id' => 11,
                'numero' => 'ECOLE / RUAKANDINGI',
                'niveau' => 2,
            ],
            [
                'id' => 12,
                'numero' => 'ECOLE / RUAKANDINGI',
                'niveau' => 3,
            ],
            [
                'id' => 13,
                'numero' => 'RUAKANDINGI',
                'niveau' => 0,
            ],
            [
                'id' => 14,
                'numero' => 'RUAKANDINGI',
                'niveau' => 1,
            ],
            [
                'id' => 15,
                'numero' => 'RUAKANDINGI',
                'niveau' => 2,
            ],
            [
                'id' => 16,
                'numero' => 'RUAKANDINGI',
                'niveau' => 3,
            ],
            [
                'id' => 17,
                'numero' => 'MARRAIS',
                'niveau' => 0,
            ],
            [
                'id' => 18,
                'numero' => 'MARRAIS',
                'niveau' => 1,
            ],
            [
                'id' => 19,
                'numero' => 'MARRAIS',
                'niveau' => 2,
            ],
            [
                'id' => 20,
                'numero' => 'MARRAIS',
                'niveau' => 3,
            ],
            [
                'id' => 21,
                'numero' => 'BOLINGO / ECOLE / RUAKANDINGI',
                'niveau' => 0,
            ],
            [
                'id' => 22,
                'numero' => 'BOLINGO / ECOLE / RUAKANDINGI',
                'niveau' => 1,
            ],
            [
                'id' => 23,
                'numero' => 'BOLINGO / ECOLE / RUAKANDINGI',
                'niveau' => 2,
            ],
            [
                'id' => 24,
                'numero' => 'BOLINGO / ECOLE / RUAKANDINGI',
                'niveau' => 3,
            ],
            [
                'id' => 25,
                'numero' => 'BOLINGO / ECOLE',
                'niveau' => 0,
            ],
            [
                'id' => 26,
                'numero' => 'BOLINGO / ECOLE',
                'niveau' => 1,
            ],
            [
                'id' => 27,
                'numero' => 'BOLINGO / ECOLE',
                'niveau' => 2,
            ],
            [
                'id' => 28,
                'numero' => 'BOLINGO / ECOLE',
                'niveau' => 3,
            ]
        ]);
    }
}
