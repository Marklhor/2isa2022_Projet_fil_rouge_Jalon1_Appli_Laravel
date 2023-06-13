<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class TypePannes extends Model
{
    use HasFactory;

    /**
     * retourne l'ensemble des types de pannes dans un tableau
     * 
     * @return array
     */
    public function getAllFailures(){
        return DB::select('SELECT Id, Label FROM PANNES_TYPE');
    }
}
