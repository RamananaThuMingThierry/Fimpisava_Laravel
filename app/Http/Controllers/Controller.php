<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $constantes;

    public function __construct()
    {
        $this->constantes = app('constants');
    }

    public function verifierNumeroTelephone($numero){
        return (bool) preg_match('/^(032|033|034|038)/', $numero);
    }
}
