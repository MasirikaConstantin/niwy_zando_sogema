<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\Vendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
       // $secteuractivtes = Vendeur::where('etat', 'attente')->get();
	    $secteuractivtes = Vendeur::get();
        $articles = ''; //Article::with('secteurActions')->orderBy('nom')->get();
        $communes = ''; //Commune::get();
        $cotegories = []; //Categorie::get();
        $personnes_attente = ''; //Vendeur::with('secteuractivite')->where('etat', 'attente')->count();
        $personnes_rejete = ''; //Personne::with('secteuractivite')->where('etat', 'rejete')->count();
        $personnes_count = $secteuractivtes->count();
        $type_place_etalage_nbr = ''; //SecteurActivite::where('type_place', 'etalage')->count();
        $type_place_maison_nbr = ''; //SecteurActivite::where('type_place', 'maison')->count();
        $users = '';//User::count();
        //dd($articles);
        //return view('dashboard', compact('articles', 'communes', 'cotegories', 'personnes_attente', 'personnes_rejete', 'personnes_count', 'type_place_etalage_nbr', 'type_place_maison_nbr', 'users'));
        //return Auth::user()->role->name;
        
        // if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "DG")
        // {
        //     $vendeursValiderCounts = Vendeur::where('etat', 'valider')->where('decision_dg', 1)->count();
        //     $vendeursNonValiderCounts = Vendeur::where('etat', 'traiter')->where('decision_dg', 0)->count();
        //     $vendeursDejaPayerCounts = Vendeur::where('etat', 'payer')->where('decision_dg', 1)->count();
        //     //return $vendeursValiderCounts;
        //     //return $this->getStatistique();
        //     $pavillons =  $this->getStatistique();//json_encode($this->getStatistique()) ;
        //     //return $pavillons['labele']; // implode(',',$pavillons['labele']); //$pavillons['labele'];
        //     return view('dashboard', compact('vendeursValiderCounts','vendeursNonValiderCounts','vendeursDejaPayerCounts','pavillons'));
        // }

        if(Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "DG")
        {
            $totalsVendeurs = Vendeur::count();
            $vendeursValiderCounts = Dossier::where('etat', 'valider')->where('decision_dg', 1)->count();
            $vendeursTraiterCounts = Dossier::where('etat', 'traiter')->count();
            $vendeursAttenteCounts = Dossier::where('etat', 'attente')->count();
            $vendeursDejaPayerCounts = Dossier::where('etat', 'payer')->where('decision_dg', 1)->count();
            return view('dashboard', compact('vendeursValiderCounts','vendeursTraiterCounts','vendeursAttenteCounts','vendeursDejaPayerCounts','totalsVendeurs'));
        }

        if(Auth::user()->role->name == "AgentTerrain")
        {
            $vendeursEnregistrerParAgentCounts = Vendeur::where('agent_id', Auth::user()->id)->count();
            $vendeursEnregistrerParAgentParJourCounts = Vendeur::where('agent_id', Auth::user()->id)->where('created_at', 'LIKE', '%' . date('Y-m-d') . '%' )->count();
            return view('dashboard', compact('vendeursEnregistrerParAgentCounts', 'vendeursEnregistrerParAgentParJourCounts'));
        }

        if(Auth::user()->role->name == "Banque")
        {
            $banques = [];
            return view('dashboard', compact('banques'));
        }        
    }

    public function getStatistique()
    {
        $pavillons = DB::table('pavillons')
                        //->join('emplacements', 'emplacements.pavillon_id', '=', 'pavillons.id')
                        //->distinct('numero')
                        ->selectRaw("
                            pavillons.id as idPavillon,
                            GROUP_CONCAT(pavillons.numero) as numeroPavillon,
                            GROUP_CONCAT(pavillons.niveau) as niveauPavillon
                            
                        ")
                        //->where('emplacements.etat','=', 1)
                        ->groupBy('pavillons.id')
                        ->orderBy('pavillons.numero', 'ASC')
                        ->get();
        
        $data = [];
        foreach($pavillons as $row)
        {
            $data['labele'][] = $row->numeroPavillon;
        }
        $data['chart_data'] = json_encode($data);
        return $data;
    }
}
