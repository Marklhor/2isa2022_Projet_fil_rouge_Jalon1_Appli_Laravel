<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\session;
use App\Model\RoleType;


class MyUserController extends Controller
{
    public static function getUserIdToSession(Request $request) : void
    {
        session(['idUser' => $request->user()->id]);
    }

    // public function newUser(){

    //     $dataRole = RoleType::getAllRoleType();
    //     return redirect()->route('register', ['dataRole'=> $dataRole]);
    // }
}
