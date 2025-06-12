<?php
namespace App\Mulangane;
use Illuminate\Support\Facades\Facade;


class MulanganeFacade extends Facade{

    protected static function getFacadeAccessor(){

        return "Mulangane";
    }
}
