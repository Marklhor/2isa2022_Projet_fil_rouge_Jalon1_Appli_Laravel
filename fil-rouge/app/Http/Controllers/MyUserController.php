<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\session;
use App\Model\RoleType;


use App\Http\Controllers\MyUserController;
use App\Models\MyUser;


class MyUserController extends Controller
{
    public static function getUserIdToSession(int $UserId) : void
    {
        session(['idUser' => $UserId]);
    }
    
    public static function choiseHomePageToRoleAndSetSession(int $idUser){ //TODO
        session(['idUser' => $idUser]);
        if(self::UserisTecHoline($idUser)){
            session(['IsTecHotline' => true]);
            return redirect()->route('tickets');

        }else{
            session(['IsTecHotline' => false]);
            return redirect()->route('mytickets',['iduser' => $idUser]);
        }

    }
    //défini si le user de la session est un techotline ou non
    private static function UserisTecHoline(int $idUser)
    {
        $MyUser = new MyUser();
        $data = $MyUser->isTecHoline($idUser);
        if ($data[0]->IdRole == 77002) {
            return true;
        } else {
            return false;
        }
    }
}
