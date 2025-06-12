<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmplacementResource extends JsonResource
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
            'numero' => $this->numero,
            'pavillon_id' => $this->pavillon_id,
            'place_id' => $this->place, //$this->place_id,
            'article_id' => $this->article_id,
            'etat' => $this->etat,
        ];
    }
}
