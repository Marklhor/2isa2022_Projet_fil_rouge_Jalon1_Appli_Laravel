<?php

namespace App\Models;

use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'TICKETS'

    private int $Id_Incident;
    private string $Sujet;
    private int $IdStatus;
    private int $IdTypePanne;
    private int $IdAuteur;
    private DateTime $CreatedAt;
    private string $UpdateAt;

    public function All_Tickets(){


        return $this->;
    }
}

