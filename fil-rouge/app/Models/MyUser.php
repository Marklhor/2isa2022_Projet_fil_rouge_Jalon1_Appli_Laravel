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
    }
}
