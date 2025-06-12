<?php

namespace App\Profondeur;

use Illuminate\Database\Eloquent\Model;
use Modules\Employe\Entities\PrimeSalaire;

class Profondeur{

    public static function codeUnique(Model $model,string $code_field,int $tailleString,string $prefix){
        $obj = $model::orderBy($code_field, "DESC")->first();
        $max = $obj == null ? 1 : (int) substr($obj->$code_field, strlen($prefix)) + 1;
        $strNumber = str_pad($max, $tailleString, "0", STR_PAD_LEFT);
        $code = $prefix . $strNumber;
        return $code;
    }

    public function mois(){
        return ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];
    }

    public function KEYWORD(){
        return  [
            "POURCENTAGE"=>"%",
            "FIXE"=>"Fixe",
            "SALAIRE_DE_BASE"=>"salaire de base",
            "PRIME"=>"prime",
            "CHARGE"=>"charge"
        ];

    }



}
