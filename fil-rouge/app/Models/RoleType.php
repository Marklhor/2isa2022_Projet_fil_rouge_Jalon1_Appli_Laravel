<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    use HasFactory;

    public static function getAllRoleType(){

        return DB:: DB::select("SELECT Id, Label FROM ROLES_TYPE;");
        
    }
}
