<?php

namespace App\Models;

use App\Models\User;
use App\Models\Place;
use App\Models\Article;
use App\Models\Paiement;
use App\Models\Pavillon;
use App\Models\TypePlace;
use App\Models\TypePavilon;
use App\Models\VendeurDemande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendeur extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "vendeurs";
    protected $fillable = [
        'nom', 'postnom', 'prenom', 'sexe', 'lieu_naissance', 'date_naissance', 
        'residence', 'telephone', 'nationalite', 'etat_civil', 'commune', 'photo', 
        'email', 'numero_patente', 'numCompteBancaire', 'rccm', 'rccm_patente', 
        'piece_identite', 'piece_identite_date_expiration', 'numero_national', 
        'personne_de_reference', 'agent_id', 'ancien_nouveau'
    ];
    public function paiement(){
        return $this->hasOne(Paiement::class);
    }

    public function Typepavillon(){
        return $this->belongsTo(TypePavilon::class, 'type_pavilon_id');
    }

    public function pavillons(){
        return $this->belongsToMany(Pavillon::class, 'avoirs', 'vendeur_id', 'pavillon_id');
    }

    public function imageUrl(){
        return $this->photo ? asset('uploaded_files/' . $this->photo) : null;
        //return Storage::disk('public')->url($this->image); 
    }
    // public function articles(){
    //     return $this->hasMany(Article::class, 'concerners', 'vendeur_id', 'article_id');
    // }

    public function articles(){
        return $this->belongsToMany(Article::class, 'concerners', 'vendeur_id', 'article_id')->withPivot('id','place_id','vendeur_id','article_id');
    }

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function userValidation(){
        return $this->belongsTo(User::class, 'userValidateur_id');
    }

    public function places(){
        return $this->belongsToMany(Place::class, 'posseders', 'vendeur_id', 'place_id')->withPivot('id','nbrMaison','nbrTable','nbrKiosque', 'nbrAutre','nbr','nbr_retenu','maitre_cube','maitre_cube_retenu','decision','created_at','updated_at'); //'vendeur_id', 'place_id',
    }

    public function typeplace(){
        return $this->belongsTo(TypePlace::class, 'type_place_id');
    }

    public function vendeurDemande(){
        return $this->hasMany(VendeurDemande::class, 'vendeur_id', 'id');
    }

    public function dossiers(){
        return $this->hasMany(Dossier::class, 'vendeur_id', 'id');

    }

    public function empreint(){
        return $this->hasOne(Empreint::class);

    }
    public function nomComplet(){
        return $this->nom .' '. $this->postnom .' '. $this->prenom;
    }



     // Dans votre modèle Vendeur.php
protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->code_unique = self::generateUniqueCode();
    });
}

public static function generateUniqueCode()
{
    $prefix = 'KN/ZD/'.date('Y').'/';
    $last = self::where('code_unique', 'like', $prefix.'%')
               ->orderBy('code_unique', 'DESC')
               ->first();
    
    $max = $last ? (int) substr($last->code_unique, strlen($prefix)) + 1 : 1;
    
    return $prefix . str_pad($max, 6, "0", STR_PAD_LEFT);
}
}
