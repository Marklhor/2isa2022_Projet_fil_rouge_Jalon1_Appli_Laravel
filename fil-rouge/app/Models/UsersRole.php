<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Exception;
use Illuminate\Support\Facades\DB;


class UsersRole extends Model
{
    use HasFactory;

    /**
     * Ajout un rôle à l'utilisateur avec transaction
     * 
     * @param int $idUser Identifiant de l'utilisateur, int $IdRole Identifiant du rôle
     * @return bool True si l'insertion est réalisée; Flase si non
     */
    public static function addRoleForUser(int $idUser, int $UserRole)
    {
        DB::beginTransaction();
        try {
            DB::insert("INSERT INTO USERS_ROLE (IdUser, IdRole) values (?,?)", [$idUser, $UserRole]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }

}
