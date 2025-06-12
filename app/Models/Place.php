<?php

namespace App\Models;

use App\Models\Article;
use App\Models\TypePlace;
use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "places";

    public function articles(){
        return $this->belongsToMany(Article::class, 'concerners', 'place_id', 'article_id');
    }

    public function typePlace(){
        return $this->belongsTo(TypePlace::class, 'type_place_id');
    }

    public function emplacements(){
        return $this->hasMany(Emplacement::class, 'place_id');
    }
}
