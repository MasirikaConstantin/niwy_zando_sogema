<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_places')->insert([
            [
                'id' => 1,
                'nom' => 'T1',
                'dimension' => '12m²'
            ],
            [
                'id' => 2,
                'nom' => 'T2',
                'dimension' => '24m²'
            ],
        ]);


        DB::table('places')->insert([
            [
                'id' => 1,
                'nom' => 'Magasin',
                'prix' => '0',
                'type_place_id' => null,
                'orientation' => ''
            ],
            [
                'id' => 2,
                'nom' => 'Etalage',
                'prix' => '0',
                'type_place_id' => null,
                'orientation' => ''             
            ],
            [
                'id' => 3,
                'nom' => 'Kiosque',
                'prix' => '0',
                'type_place_id' => null,
                'orientation' => ''              
            ],
            [
                'id' => 4,
                'nom' => 'Entrepôt',
                'prix' => '0',
                'type_place_id' => null,
                'orientation' => ''             
            ],
            [
                'id' => 5,
                'nom' => 'Chambre froide',
                'prix' => '0',
                'type_place_id' => null,
                'orientation' => ''              
            ],
            [
                'id' => 6,
                'nom' => 'Magasin',
                'prix' => '1000',
                'type_place_id' => '1',
                'orientation' => 'EX'
            ],
            [
                'id' => 7,
                'nom' => 'Magasin',
                'prix' => '2000',
                'type_place_id' => '2',
                'orientation' => 'EX'
            ]
        ]);


        DB::table('emplacements')->insert([
            [
                'id' => 1,
                'numero' => '3',
                'pavillon_id' => '1',
                'place_id' => 6,
                'article_id' => 2,
            ],
            [
                'id' => 2,
                'numero' => '5',
                'pavillon_id' => '1',
                'place_id' => 6,
                'article_id' => 2,
            ],
        ]);
    }
}
