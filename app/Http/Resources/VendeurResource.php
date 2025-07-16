<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendeurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            //'nom' => $this->nom,
            //'postnom' => $this->postnom,
            //'prenom' => $this->prenom,
            'sexe' => $this->sexe,
            'nomComplet' => $this->nomComplet(),
            'lieu_naissance' => $this->lieu_naissance,
            'date_naissance' => $this->date_naissance,
            'residence' => $this->residence,
            'telephone' => $this->telephone,
            'nationalite' => $this->nationalite,   
            'etat_civil' => $this->etat_civil,
            'commune' => $this->commune,              
            'photo' => url('/').'/'."uploaded_files/"."$this->photo",//$this->whenNotNull('storage/'.$this->photo), \Request::url()
            'etat' => $this->etat,
            //'userValidateur_id' => $this->userValidateur_id,
            //'agent_id' => $this->agent_id,
            'datecreation' => $this->datecreation,
            'nom_chef_pavillon' => $this->nom_chef_pavillon,
            'nbr_table' => $this->nbr_table,
            'statut' => $this->statut,
            'numero_patente' => $this->numero_patente, 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at, 
            'userValidateur_id' => $this->userValidation,
            'agent_id' => $this->agent,
            //'type_pavilon_id' => $this->Typepavillon,
            //'type_pavilon_id' => new TypePavillonResource($this->Typepavillon),
            //'places'=> $this->places,
        ];
    }
}
