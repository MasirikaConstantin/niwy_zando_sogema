<?php

namespace App\Http\Controllers;

use App\Models\Pavillon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function listePavillon()
    {
        //GROUP_CONCAT(DISTINCT pavillons.numero) as numeroPavillon, DISTINCT
        //COUNT(emplacements.pavillon_id) as nombrePlaceUtiliser   pavillons.id as idPavillon,
        $pavillons = DB::table('pavillons')
                        ->join('emplacements', 'emplacements.pavillon_id', '=', 'pavillons.id')
                        //->distinct('numero')
                        ->selectRaw("
                            GROUP_CONCAT(DISTINCT pavillons.numero) as numeroPavillon,
                            GROUP_CONCAT(DISTINCT pavillons.niveau) as niveauPavillon,
                            COUNT(emplacements.pavillon_id) as nombrePlaceUtiliser
                        ")
                        //->where('emplacements.etat','=', 1)
                        ->groupBy('pavillons.numero')
                        ->orderBy('pavillons.numero', 'ASC')
                        ->get();
        //return $pavillons->count();
        //return $pavillons;

        $data = [];
        foreach($pavillons as $row)
        {
            $data['labele'][] = $row->numeroPavillon;//." ". $row->niveauPavillon;
            $data['data'][] = $row->nombrePlaceUtiliser;
        }

        //return response()->json(['statut_code'=>200,'myData'=> $data],200);
        return json_encode($data); //response()->json($data);
    }
}
