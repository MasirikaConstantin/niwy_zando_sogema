<?php

namespace App\Models;

use App\Models\Place;
use App\Models\Article;
use App\Models\Pavillon;
use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendeurDemande extends Model
{
    use HasFactory;

    protected $table = "vendeur_demandes";
    protected $guarded = [];
        protected $fillable = [
            'dossier_id',
            'article_id',
            'pavillon_id',
            'place_id',
            'emplacement_id',
            'quantite',
            'prix',
            'mois',
            'total',
            'remise',
            'decision',
            'date_decision',
            'decision_banque',
            'date_decision_banque',
            'nom_agent_banque',
            'userValidateur',
        ];
    
    public function article(){
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function place(){
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function pavillon(){
        return $this->belongsTo(Pavillon::class, 'pavillon_id');
    }

    public function emplacement(){
        return $this->belongsTo(Emplacement::class, 'emplacement_id');
    }
}
