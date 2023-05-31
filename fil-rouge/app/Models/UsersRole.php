<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    use HasFactory;

    public function postMyRole(int $idUser, int $UserRole)
    {
        DB::beginTransaction();
        try {
            DB::insert("INSERT INTO USERS_ROLE (IdUser, Label) values (?,?)", [$idUser, $UserRole]);
            DB::commit();
            // return true;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return false;
        }
        // dd($return);
        return true;
    }

}
