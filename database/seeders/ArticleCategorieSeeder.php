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
                'nom' => 'Grande boutique en attente attribution',
            ],
            [
                'id' => 2,
                'nom' => 'Quincailleries',
            ],
            [
                'id' => 3,
                'nom' => 'Boutiques pour Appareil Electronique',
            ],
            [
                'id' => 4,
                'nom' => 'Boutiques pour Appareil Electroménager',
            ],
            [
                'id' => 5,
                'nom' => 'Boutiques pour Fourniture de bureau , librairie, imprimerie et bureautique',
            ],
            [
                'id' => 6,
                'nom' => 'Boutiques pour Agence de voyage et de fret',
            ],
            [
                'id' => 7,
                'nom' => 'Boutiques pour Caviste',
            ],
            [
                'id' => 8,
                'nom' => 'Boutiques pour Charcuterie, sandwicherie, patisserie et cremerie',
            ],
            [
                'id' => 9,
                'nom' => 'Boutiques pour Vivre et divers (pattes, boite de conserve, épicerie et autes produits sec en gros)',
            ],
            [
                'id' => 10,
                'nom' => 'Boutiques pour Chambre froide Négatives',
            ],
            [
                'id' => 11,
                'nom' => 'Boutiques pour Chambre froide Positives',
            ],
            [
                'id' => 12,
                'nom' => 'Location dépôt',
            ],
            [
                'id' => 13,
                'nom' => 'Locaux sous escalier',
            ],
            [
                'id' => 14,
                'nom' => 'Boutiques pour Décoration et Ornement interieur maison',
            ],
            [
                'id' => 15,
                'nom' => 'Boutiques pour Casserollerie et ornement',
            ],
            [
                'id' => 16,
                'nom' => 'Boutiques pour Objet plastique',
            ],
            [
                'id' => 17,
                'nom' => 'Boutiques pour Vivre sec en gros (Riz, poissons salé, poisson fumé, sac de fufu, sac de mais, etc…)',
            ],
            [
                'id' => 18,
                'nom' => 'Boutique Hors Formats (ex banques)',
            ],
            [
                'id' => 19,
                'nom' => 'Boutiques pour CAMBISTE, Bureau de Change et Mobile Money',
            ],
            [
                'id' => 20,
                'nom' => 'Boutiques pour Parfumerie Homme et femme',
            ],
            [
                'id' => 21,
                'nom' => 'Boutiques pour Produits cosmétiques Homme Femme',
            ],
            [
                'id' => 22,
                'nom' => 'Boutiques pour Mercerie',
            ],
            [
                'id' => 23,
                'nom' => 'Boutiques pour Atelier de coutures',
            ],
            [
                'id' => 24,
                'nom' => 'Boutiques pour Produits capilaires et et saon de coiffures',
            ],
            [
                'id' => 25,
                'nom' => 'Boutiques pour Magasin de chaussure Femme / Homme',
            ],
            [
                'id' => 26,
                'nom' => 'Boutiques pour Mode (Habillement & Maroquinnerie)',
            ],
            [
                'id' => 27,
                'nom' => 'Boutiques pour Banques',
            ],
            [
                'id' => 28,
                'nom' => 'Zone TOMBOLA / Fripperie',
            ],
            [
                'id' => 29,
                'nom' => 'Zone kiosque',
            ],
            [
                'id' => 30,
                'nom' => "Zone œuvre d'art",
            ],
            [
                'id' => 31,
                'nom' => "Restaurant unique",
            ],
            [
                'id' => 32,
                'nom' => "Stand  pour plusieurs restaurants MALEWA",
            ],
            
        ]);
    }
}
