<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articleCategorie extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "article_categories";
}
