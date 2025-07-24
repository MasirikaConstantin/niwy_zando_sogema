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
        'decision_banque',
        'date_decision_banque',
        'nom_agent_banque',
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

    public function userValidation()
    {
        return $this->belongsTo(User::class, 'userTraiter_id');
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
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Récupère le nombre de dossiers existants pour ce vendeur
            $count = self::where('vendeur_id', $model->vendeur_id)->count();
            
            // Incrémente de 1 pour obtenir le nouveau numéro
            $model->numdossier = $count + 1;
            
            // Formatage optionnel (ex: VEN-001)
            // $model->numdossier = 'VEN-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        });

        static::deleting(function ($model) {
            // Optionnel: Réorganiser les numéros après suppression
            self::reorganiserNumerosDossiers($model->vendeur_id);
        });
    }

    // Méthode optionnelle pour réorganiser les numéros après suppression
    protected static function reorganiserNumerosDossiers($vendeur_id)
    {
        $dossiers = self::where('vendeur_id', $vendeur_id)
                    ->orderBy('created_at')
                    ->get();
                    
        foreach ($dossiers as $index => $dossier) {
            $dossier->numdossier = $index + 1;
            $dossier->save();
        }
    }
}