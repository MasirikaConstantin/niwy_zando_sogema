<?php

namespace App\Models;

use App\Models\Place;
use App\Models\Pavillon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emplacement extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "emplacements";


    public function pavillon(){
        return $this->belongsTo(Pavillon::class, 'pavillon_id');
    }

    public function place(){
        return $this->belongsTo(Place::class, 'place_id');
    }
}
