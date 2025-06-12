<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePavilon extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "type_pavilons";

    public function pavillons(){
        return $this->belongsToMany(Pavillon::class, 'avoirs', 'type_pavilon_id', 'pavillon_id');
    }
}
