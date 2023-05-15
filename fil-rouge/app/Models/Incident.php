<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    private int $id;
    private string $sujet;
    private int $idStatus;
    private int $idTypePanne;
    private int $idAuteur;
    private DateTime $createdAt;
    private string $updateAt;
    // private int $roleId;


}
}
