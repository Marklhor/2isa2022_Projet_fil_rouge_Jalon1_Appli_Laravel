<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\session;
use App\Model\RoleType;


use App\Http\Controllers\MyUserController;
use App\Models\MyUser;


class MyUserController extends Controller
{
    /**
     * défini si le user de la session est un techotline ou non
     * 
     * @param int $idUser identifiant de l'utilisateur
     * @return redirect route tickets si techotline, mytickets si usager
     */
    public static function choiseHomePageToRoleAndSetSession(int $idUser){
       session(['idUser' => $idUser]); 

        // TODO remplacer l'identifiant de session par le helper de Fortifi  dd(auth()->user()->id);
        // TODO l'iduser est nul malgré son assignation  // NON passer par dd(auth()->user()->id);
        // dd('session : ',session()->get('idUser'));
        
        if(self::UserisTecHoline($idUser)){
            session(['IsTecHotline' => true]);
            return redirect()->route('tickets');

        }else{
            session(['IsTecHotline' => false]);
            return redirect()->route('mytickets',['iduser' => $idUser]);
        }
    }
    /**
     * défini si le user de la session est un techotline ou non
     * 
     * @param int $idUser identifiant de l'utilisateur
     * @return bool
     */
    private static function UserisTecHoline(int $idUser)
    {
        $MyUser = new MyUser();
        $data = $MyUser->getIdRole($idUser);
        if ($data->IdRole == 77002) {
            return true;
        } else {
            return false;
        }
    }
}
