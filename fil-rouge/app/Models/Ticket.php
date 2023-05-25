<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;

    private static $ValueNewIdTicket = 99400;

    public function getAll()
    {
        /**
         * Utilisation de la façade DB::select
         */
        return DB::select('SELECT * FROM TICKETS');
    }

    public function getTicketById(int $Id)
    {
        /**
         * Construction d'une requète préparée
         * pour se protéger des injection SQL
         */
        return DB::select('SELECT * FROM TICKETS WHERE Id = ?', [$Id]);
    }

    public function getTickets()
    {
        return DB::select(
            "SELECT
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
        return DB::select(
            "SELECT
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
        WHERE users.id = ?",
            [$id_user]
        );
    }

    public function postMyTicket(int $newIdTicket, int $newIdMessage, string $Sujet, int $PanneType, int $idUser, string $Message)
    {
        DB::beginTransaction();
        try {
            $ToDay = strval(date("Y-m-d H:i:s"));
            $Message = strval($Message);
            DB::insert("INSERT INTO TICKETS (Id,Sujet,IdStatus,IdTypePanne,IdAuteur,CreatedAT) values (?,?,?,?,?,?)", [$newIdTicket, $Sujet, 11111, $PanneType, $idUser, $ToDay]);

            DB::insert("INSERT INTO USERS_MESSAGES (Id, IdAuteur, Content, CreateAt) values(?,?,?,?)", [$newIdMessage, $idUser, $Message, $ToDay]);
            // return true if request ok

            DB::insert("INSERT INTO MESSAGES_TYCKET (IdMessage, IdTicket) values(?,?)", [$newIdMessage, $newIdTicket]);
            // return true if request ok
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

    public static function getMaxId()
    {

        $max = DB::selectone("SELECT MAX(Id) AS 'max' FROM TICKETS");
        if ($max->max < self::$ValueNewIdTicket) {
            return self::$ValueNewIdTicket;
        } else {
            return $max;
        }
    }
}
