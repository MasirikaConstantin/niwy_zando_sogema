<?php

namespace App\Models;

use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "articles";

    public function emplacements(){
        return $this->hasMany(Emplacement::class, 'article_id');
    }
}
