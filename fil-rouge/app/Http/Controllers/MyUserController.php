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
    

    // public function newUser(){

    //     $dataRole = RoleType::getAllRoleType();
    //     return redirect()->route('register', ['dataRole'=> $dataRole]);
    // }

    public function hasOldPssword(){
        // 'password' => Hash::make($input['password'])

        
    }
}
