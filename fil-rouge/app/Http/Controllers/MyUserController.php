<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\session;
use App\Model\RoleType;


class MyUserController extends Controller
{
    public static function getUserIdToSession(int $UserId) : void
    {
        session(['idUser' => $UserId]);
    }
    
    public static function choiseHomePageToRoleAndSetSession(int $idUser){ //TODO
        session(['idUser' => $idUser]);
        dd('ici');
        if(this->UserisTecHoline()){
            session(['IsTecHotline' => true]);
            return redirect()->route('tickets');

        }else{
            session(['IsTecHotline' => false]);
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
    private function UserisTecHoline()
    {
        $MyUser = new MyUser();
        $data = $MyUser->isTecHoline();
        // dd($data);
        if ($data[0]->IdRole = 77002) {
            // dd($data);
            return true;
        } else {
            return false;
        }
    }
}
