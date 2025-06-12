<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\EmplacementResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
        return [
            "id" => $this->id,
            "nom" => $this->nom,
            // "emplacement" => $this->when(
            //     $this->emplacements->contains(fn($emplacement) => $emplacement->etat != 0),
            //     EmplacementResource::collection($this->emplacements)
            // ), //$this->emplacements, // EmplacementResource::collection($this->emplacements),
        ];
    }
}
