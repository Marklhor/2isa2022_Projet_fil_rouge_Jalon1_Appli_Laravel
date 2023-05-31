<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\UsersRole;
// use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\session;


class UsersRoleContoller extends Controller
{
    /**
     * Ajout un rôle à l'utilisateur
     * 
     * @param int $idUser Identifiant de l'utilisateur, int $IdRole Identifiant du rôle
     * @return bool True si l'insertion est réalisée; Flase si non
     */
    public static function addRoleForUser(int $idUser, int $IdRole){

        $UserRole = new UsersRole();
        $data = $UserRole->addRoleForUser($idUser,  $IdRole);

        if ($data) {
            return true;
        }else{
            return false;
        }
    } 
}
