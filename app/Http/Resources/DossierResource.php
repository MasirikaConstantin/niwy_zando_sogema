<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DossierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'vendeur_id'=>$this->vendeur_id,
            'numdossier'=>$this->numdossier,
            'etat'=>$this->etat,
            'date_traitement'=>$this->date_traitement,
            'date_paiment'=>$this->date_paiment,
            'date_validation_dg'=>$this->date_validation_dg,
            'decision_dg'=>$this->decision_dg,
            'userTraiter_id'=>$this->userTraiter_id,
            'agent_id'=>$this->agent_id,
            'datecreation'=>$this->datecreation,
            'nbr_table'=>$this->nbr_table,
            'statut'=>$this->statut,
            'agentBanque'=>$this->agentBanque,
           'vendeur'=>new VendeurResource($this->vendeur),
        ];
    }
}
