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
        // dd('ici');
        if(self::UserisTecHoline($idUser)){
            session(['IsTecHotline' => true]);
            return redirect()->route('tickets');
            // dd('teck');

        }else{
            session(['IsTecHotline' => false]);
            // dd('non teck');
            return redirect()->route('mytickets',['iduser' => $idUser]);
        }

    }
    // public function newUser(){

    //     $dataRole = RoleType::getAllRoleType();
    //     return redirect()->route('register', ['dataRole'=> $dataRole]);
    // }

    // public function hasOldPssword(){
    //     // 'password' => Hash::make($input['password'])
    // }

    //défini si le user de la session est un techotline ou non
    private static function UserisTecHoline(int $idUser)
    {
        $MyUser = new MyUser();
        $data = $MyUser->isTecHoline($idUser);
        // dd($data);
        if ($data[0]->IdRole == 77002) {
            // dd($data[0]->IdRole, session()->get('idUser'), 1);
            return true;
        } else {
            // dd($data[0]->IdRole, session()->get('idUser'), 2);

            return false;
        }
    }
}
