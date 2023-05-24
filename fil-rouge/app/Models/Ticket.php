<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Ticket extends Model
{
    use HasFactory;

    private static $ValueNewIdTicket = 99400;
    /**
     * Nom de la table dans la BDD
     */
    protected $table = 'TICKETS';

    public function getAll()
    {
        /**
         * Utilisation de la façade DB::select
         */
        return DB::select('SELECT * FROM TICKETS');
    }

    public function getTicketById($Id)
    {
        /**
         * Construction d'une requète préparée
         * pour se protéger des injection SQL
         */
        return DB::select('SELECT * FROM TICKETS WHERE Id = ?', [$Id]);
    }

    public function getTickets()
    {
        return DB::select("SELECT
        TICKETS.Id AS 'id_ticket',
        TICKETS.Sujet AS 'sujet',
        STATUS_TYPE.Id AS 'id_status',
        STATUS_TYPE.Label AS 'status_label',
        PANNES_TYPE.Id AS 'id_type_de_panne',
        PANNES_TYPE.Label AS 'type_de_panne',
        users.id AS 'id_user',
        CONCAT(users.name, ' ', LEFT(users.firstname, 1), '.') AS 'nom',
        DATEDIFF(TICKETS.UpdateAt, TICKETS.CreatedAt) AS 'avancement',
        TICKETS.CreatedAt AS 'date_de_creation',
        TICKETS.UpdateAt AS 'date_de_maj',
        (SELECT COUNT(*) FROM MESSAGES_TYCKET WHERE MESSAGES_TYCKET.IdTicket = TICKETS.Id) AS 'nb_de_message'
        FROM
            TICKETS
            JOIN PANNES_TYPE ON TICKETS.IdTypePanne = PANNES_TYPE.Id
            JOIN users ON TICKETS.IdAuteur = users.id
            JOIN STATUS_TYPE ON TICKETS.IdStatus = STATUS_TYPE.Id"

        );
    }

    public function getMyTickets(int $id_user)
    {
        return DB::select("SELECT
        TICKETS.Id AS 'id_ticket',
        TICKETS.Sujet AS 'sujet',
        STATUS_TYPE.Id AS 'id_status',
        STATUS_TYPE.Label AS 'status_label',
        PANNES_TYPE.Id AS 'id_type_de_panne',
        PANNES_TYPE.Label AS 'type_de_panne',
        users.id AS 'id_user',
        CONCAT(users.name, ' ', LEFT(users.firstname, 1), '.') AS 'nom',
        DATEDIFF(TICKETS.UpdateAt, TICKETS.CreatedAt) AS 'avancement',
        TICKETS.CreatedAt AS 'date_de_creation',
        TICKETS.UpdateAt AS 'date_de_maj',
        (SELECT COUNT(*) FROM MESSAGES_TYCKET WHERE MESSAGES_TYCKET.IdTicket = TICKETS.Id) AS 'nb_de_message'
        FROM
            TICKETS
            JOIN PANNES_TYPE ON TICKETS.IdTypePanne = PANNES_TYPE.Id
            JOIN users ON TICKETS.IdAuteur = users.id
            JOIN STATUS_TYPE ON TICKETS.IdStatus = STATUS_TYPE.Id
        WHERE users.id = ?",[$id_user]
        );
    }

    public function postMyTicket(Resquest $resquest, $newIdTicket, $newIdMessage){

        return DB::transaction(function () use ($resquest, $newIdTicket, $newIdMessage) {
            
            //$IdMax = self::getMaxId();
            $ToDay =strval(date("Y-m-d H:i:s")) ;
            $message = strval($resquest->message);

            DB::insert("INSERT INTO TICKETS (Id,Sujet,IdStatus,IdTypePanne,IdAuteur,CreatedAT) values (?,?,?,?,?,?)", [$newIdTicket, $resquest->get('sujet'),11111, $resquest->get('panne_type'), session()->get('idUser'), $ToDay]);

            DB::insert("INSERT INTO USERS_MESSAGES (Id, IdAuteur, Content, CreateAt) values(?,?,?,?)", [$newIdMessage, session()->get('idUser'), $message, $ToDay]);
            // return true if request ok

            DB::insert("INSERT INTO MESSAGES_TYCKET (IdMessage, IdTicket) values(?,?)", [$newIdMessage, $newIdTicket]);
            // return true if request ok

            // DB::update("UPDATE TICKETS SET UpdateAt = ? WHERE Id = ?", [$ToDay, $newIdTicket]);
            // return 1 if request ok, nb of ligne update
        });
    }

    public static function getMaxId(){

        $max = DB::selectone("SELECT MAX(Id) AS 'max' FROM TICKETS");
        if ($max->max < self::$ValueNewIdTicket) {
            return self::$ValueNewIdTicket;
        }else{
            return $max;
        }
    }


}
