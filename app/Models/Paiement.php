<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vendeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "paiements";

    public function user(){
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function vendeur(){
        return $this->belongsTo(Vendeur::class, 'vendeur_id');
    }
}
