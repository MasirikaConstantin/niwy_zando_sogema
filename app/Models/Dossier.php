<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendeur_id',
        'etat',
        'date_traitement',
        'date_paiment',
        'date_validation_dg',
        'decision_dg',
        'userTraiter_id',
        'agent_id',
        'type_pavilon_id',
        'datecreation',
        'nom_chef_pavillon',
        'nbr_table',
        'statut',
        'agentBanque',
    ];

    protected $casts = [
        'date_traitement' => 'datetime',
        'date_paiment' => 'datetime',
        'date_validation_dg' => 'datetime',
        'decision_dg' => 'boolean',
        "datecreation"=>"date",
    ];

    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }

    public function demandes()
    {
        return $this->hasMany(VendeurDemande::class);
    }

    public function userTraiter()
    {
        return $this->belongsTo(User::class, 'userTraiter_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function typePavilon()
    {
        return $this->belongsTo(TypePavilon::class, 'type_pavilon_id');
    }
    public function vendeurDemandes()
    {
        return $this->hasMany(VendeurDemande::class, 'dossier_id');
    }

    public function vendeurDemande()
    {
        return $this->hasMany(VendeurDemande::class, 'dossier_id');
    }
}