<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('article_categories')->insert([
        //articles
        DB::table('articles')->insert([
            [
                'id' => 1,
                'nom' => 'Quincailleries',

            ],
            [
                'id' => 2,
                'numero' => 'Boutiques pour Appareil Electronique',
            ],
            [
                'id' => 3,
                'numero' => 'Boutiques pour Appareil Electroménager',
            ],
            [
                'id' => 4,
                'numero' => 'Boutiques pour Fourniture de bureau ,librairie, imprimerie et bureautique',
            ],
            [
                'id' => 5,
                'numero' => 'Boutiques pour Agence de voyage et de fret',
            ],
            [
                'id' => 6,
                'numero' => 'Boutiques pour Caviste',
            ],
            [
                'id' => 7,
                'numero' => 'Boutiques pour Charcuterie, sandwicherie, patisserie et cremerie',
            ],
            [
                'id' => 8,
                'numero' => 'Boutiques pour Vivre et divers (pattes, boite de conserve, épicerie et autes produits sec en gros)',
            ],
            [
                'id' => 9,
                'numero' => 'Boutiques pour Chambre froide Négatives',
            ],
            [
                'id' => 10,
                'numero' => 'Boutiques pour Chambre froide Positives',
            ],
        ]);
    }
}
