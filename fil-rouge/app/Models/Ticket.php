<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;

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
    }

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

    public function getMyTicket(int $id_user)
    {
        return DB::select("SELECT
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
            JOIN STATUS_TYPE ON TICKETS.IdStatus = STATUS_TYPE.Id
        WHERE USERS.Id = ?",[$id_user]
        );
    }


}
