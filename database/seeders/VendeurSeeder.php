<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendeur; // Assurez-vous d'importer votre modèle Vendeur
use App\Models\User;    // Assurez-vous d'importer votre modèle User pour l'agent_id
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class VendeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialise Faker pour avoir des données en français
        $faker = Faker::create('fr_FR');

        // Récupère les IDs des agents (utilisateurs) existants pour l'association
        // On ajoute 'null' pour pouvoir assigner des vendeurs sans agent
        $agentIds = User::pluck('id')->toArray();
        $agentIds[] = null;

        for ($i = 0; $i < 50; $i++) {
            $sexe = $faker->randomElement(['M', 'F']);
            $prenom = $faker->firstName($sexe === 'M' ? 'male' : 'female');

            Vendeur::create([
                'code_unique' => 'VEN-' . now()->year . '-' . Str::random(8),
                'nom' => $faker->lastName,
                'postnom' => $faker->lastName,
                'prenom' => $prenom,
                'sexe' => $sexe,
                'lieu_naissance' => $faker->city,
                'date_naissance' => $faker->date('Y-m-d', '2004-01-01'),
                'residence' => $faker->address,
                'telephone' => $faker->e164PhoneNumber,
                'nationalite' => $faker->randomElement(['Congolaise', 'Française', 'Belge']),
                'etat_civil' => $faker->randomElement(['Célibataire', 'Marié(e)', 'Divorcé(e)', 'Veuf(ve)']),
                'commune' => $faker->city,
                'photo' => null, // Ou $faker->imageUrl(640, 480, 'people') si vous voulez des images de test
                'email' => $faker->unique()->safeEmail,
                'numero_patente' => $faker->numerify('PAT-#######'),
                'numCompteBancaire' => $faker->bankAccountNumber,
                'rccm' => 'RCCM/' . $faker->numerify('##########'),
                'rccm_patente' => $faker->randomElement(['OUI', 'NON']),
                'piece_identite' => $faker->randomElement(['Passeport', 'Carte d\'électeur', 'Permis de conduire']),
                'piece_identite_date_expiration' => $faker->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
                'numero_national' => $faker->numerify('##################'),
                'personne_de_reference' => 'Nom: ' . $faker->name . ', Tel: ' . $faker->e164PhoneNumber,
                'agent_id' => $faker->randomElement($agentIds), // Assigne un agent au hasard ou null
                'ancien_nouveau' => $faker->boolean(70), // 70% de chance d'être 'true' (1 = ancien)
            ]);
        }
    }
}