<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyUser extends Model
{
    use HasFactory;

    public function isTecHoline(int $idUser)
    {
        return DB::select("SELECT IdRole FROM USERS_ROLE WHERE IdUser = ?", [$idUser]);
        // return DB::select("select rt.Id AS 'IdRole' FROM USERS_ROLE ur JOIN ROLES_TYPE rt ON ur.IdRole =  rt.Id WHERE ur.IdUser = ?", [$idUser]);
        // dd($data);

    }

    // public static function getUserId($IdUser){
    //     return DB::selectone("SELECT users.id FROM users WHERE id = ?",[$IdUser]);
    // }
}
