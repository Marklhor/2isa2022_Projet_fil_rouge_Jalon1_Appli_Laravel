<?php

namespace App\Models\Incident;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Faker\Provider\DateTime


class ClassName extends AnotherClass implements Interface
{

}


class Incident extends Model
{
    use HasFactory;

    private int $IdTicket;
    private string $Sujet;
    private int $IdStatus;
    private string $StatusLabel;
    private int $IdTypePanne;
    private string $TypePanneLabel;
    private int $IdUser;
    private string $UserName;
    private int $Avancement;
    private DateTime $DateDeCreation;
    private DateTime $DateDeMaj;
    private int $NbMessages;

    protected $table = 'TICKETS';


    // public function __construct(=array()){

    // }
    // int id_ticket,string sujet, int id_status,string status_label, int id_type_de_panne, string type_de_panne, int id_user, string nom, int avancement, DateTime date_de_creation,DateTime date_de_maj, intnb_de_message
    public function __construct($array) {
        this->IdTicket = $array[];
        this->Sujet = $array[];
        this->IdStatus = $array[];
        this->StatusLabel = $array[];
        this->IdTypePanne = $array[];
        this->TypePanneLabel = $array[];
        this->IdUser = $array[];
        this->UserName= $array[];
        this->Avancement = $array[];
        this->DateDeCreation = $array[];
        this->DateDeMaj = $array[];
        this->NbMessages = $array[];
    }
    /*
    public function setIncident(){
    }
    */

    public function getAllTickets()
    {
        $result[] = [];
        $Tickets = DB::select("SELECT
                TICKETS.Id AS 'id_ticket',
                TICKETS.Sujet AS 'sujet',
                STATUS_TYPE.Id AS 'id_status',
                STATUS_TYPE.Label AS 'status_label',
                PANNES_TYPE.Id AS 'id_type_de_panne',
                PANNES_TYPE.Label AS 'type_de_panne',
                USERS.Id AS 'id_user',
                CONCAT(USERS.Nom, ' ', LEFT(USERS.Prenom, 1), '.') AS 'nom',
                DATEDIFF(TICKETS.UpdateAt, TICKETS.CreatedAt) AS 'avancement',
                TICKETS.CreatedAt AS 'date_de_creation',
                TICKETS.UpdateAt AS 'date_de_maj',
                (SELECT COUNT(*) FROM MESSAGES_TYCKET WHERE MESSAGES_TYCKET.IdTicket = TICKETS.Id) AS 'nb_de_message'
                FROM
                    TICKETS
                    JOIN PANNES_TYPE ON TICKETS.IdTypePanne = PANNES_TYPE.Id
                    JOIN USERS ON TICKETS.IdAuteur = USERS.Id
                    JOIN STATUS_TYPE ON TICKETS.IdStatus = STATUS_TYPE.Id"
        );
        $i=0;
        foreach($Tickets as $Ticket){
            $temps = compact($Ticket);
            $result[i]= new Incident($temps->id_ticket,
                                    $temps->sujet,
                                    $temps->id_status,
                                    $temps->status_label,
                                    $temps->id_type_de_panne,
                                    $temps->type_de_panne,
                                    $temps->id_user,
                                    $temps->nom,
                                    $temps->avancement,
                                    $temps->date_de_creation,
                                    $temps->date_de_maj,
                                    $temps->nb_de_message,
                                );
        }


        return $result;
    }

    public function getMyTickets(int $MyId )
    {
        return DB::select("SELECT
        TICKETS.Id AS 'reference_du_ticket',
        TICKETS.Sujet AS 'sujet',
        STATUS_TYPE.Id AS 'id_status',
        STATUS_TYPE.Label AS 'status_label',
        PANNES_TYPE.Id AS 'id_type_de_panne',
        PANNES_TYPE.Label AS 'type_de_panne',
        DATEDIFF(TICKETS.UpdateAt, TICKETS.CreatedAt) AS 'avancement',
        TICKETS.CreatedAt AS 'date_de_creation',
        TICKETS.UpdateAt AS 'date_de_maj',
        (SELECT COUNT(*) FROM MESSAGES_TYCKET WHERE MESSAGES_TYCKET.IdTicket = TICKETS.Id) AS 'nombre_de_message'
        FROM
            TICKETS
            JOIN PANNES_TYPE ON TICKETS.IdTypePanne = PANNES_TYPE.Id
            JOIN USERS ON TICKETS.IdAuteur = USERS.Id
            JOIN STATUS_TYPE ON TICKETS.IdStatus = STATUS_TYPE.Id
        WHERE USERS.Id = ?;",[$MyId]);
    }

    public function getMyTicket(int $MyId, int $TheTicket){

        //TODO
        return true;
    }


}
