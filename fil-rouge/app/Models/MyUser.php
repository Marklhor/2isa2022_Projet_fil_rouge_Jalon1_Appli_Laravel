<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyUser extends Model
{
    use HasFactory;

    /**
     * Ré"cupère l'Id du rôle pour un utilisateur donné
     * 
     * @param int $idUser Identifiant de l'utilisateur, int $IdRole Identifiant du rôle
     * @return int Id du rôle
     */
    public function getIdRole(int $idUser)
    {
        return DB::selectone("SELECT IdRole FROM USERS_ROLE WHERE IdUser = ?", [$idUser]);
    }
}
