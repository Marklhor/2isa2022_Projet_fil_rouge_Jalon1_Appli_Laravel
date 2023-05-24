<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Ticket extends Model
{
    use HasFactory;

    private static $NewIdTicket = 99400;
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

    /*
    // public function getTicket(int $id_ticket)
    // {
    //     return DB::select("SELECT
    //     TICKETS.Id AS 'id_ticket',
    //     TICKETS.Sujet AS 'sujet',
    //     STATUS_TYPE.Id AS 'id_status',
    //     STATUS_TYPE.Label AS 'status_label',
    //     PANNES_TYPE.Id AS 'id_type_de_panne',
    //     PANNES_TYPE.Label AS 'type_de_panne',
    //     USERS.Id AS 'id_user',
    //     CONCAT(USERS.Nom, ' ', LEFT(USERS.Prenom, 1), '.') AS 'nom',
    //     DATEDIFF(TICKETS.UpdateAt, TICKETS.CreatedAt) AS 'avancement',
    //     TICKETS.CreatedAt AS 'date_de_creation',
    //     TICKETS.UpdateAt AS 'date_de_maj',
    //     (SELECT COUNT(*) FROM MESSAGES_TYCKET WHERE MESSAGES_TYCKET.IdTicket = TICKETS.Id) AS 'nb_de_message'
    //     FROM
    //         TICKETS
    //         JOIN PANNES_TYPE ON TICKETS.IdTypePanne = PANNES_TYPE.Id
    //         JOIN USERS ON TICKETS.IdAuteur = USERS.Id
    //         JOIN STATUS_TYPE ON TICKETS.IdStatus = STATUS_TYPE.Id
    //     WHERE TICKETS.Id = ?",[$id_ticket]
    //     );
    // }
        */

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

    public function postMyTicket(Resquest $resquest){

        return DB::transaction(function () use ($resquest) {
            
            
            $IdMax = self::getMaxId();
            $ToDay =strval(date("Y-m-d H:i:s")) ;
            $message = strval($resquest->message);

            DB::insert("INSERT INTO TICKETS (Id,Sujet,IdStatus,IdTypePanne,IdAuteur,CreatedAT) values (?,?,?,?,?,?)", [$IdMax+1, $resquest->sujet])

            // l'Id du message est défini par la variable statique est la méthode getNewId
            DB::insert("INSERT INTO USERS_MESSAGES (Id, IdAuteur, Content, CreateAt) values(?,?,?,?)", [$newID, session()->get('idUser'), $message, $ToDay]);
            // return true if request ok
// TODO
            DB::insert("INSERT INTO MESSAGES_TYCKET (IdMessage, IdTicket) values(?,?)", [$newID, session()->get('idTicket')]);
            // return true if request ok

            DB::update("UPDATE TICKETS SET UpdateAt = ? WHERE Id = ?", [$ToDay, session()->get('idTicket')]);
            // return 1 if request ok

        });
    }

    public static function getMaxId(){

        $max = DB::selectone("SELECT MAX(Id) AS 'max' FROM TICKETS");
        if ($max < self::NewIdTicket) {
            return self::NewIdTicket;
        }else{
            return $max;
        }
    }


}
