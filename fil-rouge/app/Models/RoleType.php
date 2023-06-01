<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    use HasFactory;

    /**
     * Récupère l'ensemble des rôles existants
     * 
     * @return array [int Id, string Label]
     */
    public static function getAllRoleType(){

        return DB:: DB::select("SELECT Id, Label FROM ROLES_TYPE;");
        
    }
}
