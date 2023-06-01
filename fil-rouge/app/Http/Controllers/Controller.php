<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Supprimer de la session en cours les valeurs pour les clefs 'errordb' et 'noticket'
     */
    public static function forgetItemsSession() : void
    { 
        session()->forget('errordb');
        session()->forget('noticket');
    }
}

