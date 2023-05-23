<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

// use PHPUnit\Framework\Constraint\IsTrue;

class Message extends Model
{
    use HasFactory;

    // Valeur arbitraire, pour être sup au Id du jeu de données
    private static int $IdMessage = 50000;

    // *******************************************
    // Methode pour récupérer tous les méssages pour un ticket suivant son Id
    // *******************************************
    public function getAllMessagesForTicket(int $IdTicket)
    {
        /**
         * Utilisation de la façade DB::select
         */
        return DB::select("SELECT mt.IdMessage as 'id', t.sujet as 'sujet' ,st.Label as 'status_label', mt.IdTicket as 'id_ticket', um.Content as 'msg', u.id as 'id_user', CONCAT(u.name, ' ', LEFT(u.firstname, 1), '.') AS 'nom', um.CreateAt as 'date_message', t.CreatedAt as 'date_de_creation', t.UpdateAt as 'date_de_maj', ur.IdRole as 'id_role'
        From MESSAGES_TYCKET mt JOIN USERS_MESSAGES um ON mt.IdMessage = um.Id
            JOIN users u ON um.IdAuteur = u.id
            JOIN TICKETS t ON mt.IdTicket = t.Id
            JOIN STATUS_TYPE st ON t.IdStatus = st.Id
            JOIN USERS_ROLE ur ON um.IdAuteur = ur.IdUser
        WHERE mt.IdTicket = ?", [$IdTicket]);
    }

    // *******************************************
    // Méthode pour poster un nouveau message via une transacion
    // *******************************************
    public function postMyMessage($message)
    {
        // $message = strval($message);
        // dd(session()->all());
        /**
         * Utilisation de la façade DB::transaction gérant seul les roolback et commit en fonction de la réussite des façade insert
         */
        // return DB::transaction(function ($message) {
            DB::insert("INSERT INTO USERS_MESSAGES (Id, IdAuteur, Content) values(?,?,?)", [Message::getNewId(true), session()->get('idUser'), $message]);
            DB::insert("INSERT INTO MESSAGES_TYCKET (IdMessage, IdTicket) values(?,?)", [session()->get('idTicket'), Message::getNewId(false)]);
        // });
    }

    // *******************************************
    // Méthode pour récupérer l'indice pour le nouveau message ($increment = true), ou le dernier indice ($increment = false)
    // *******************************************
    public static function getNewId(bool $increment)
    {
        if ($increment) {
            self::$IdMessage++;
        }
        return Message::$IdMessage;
    }

    // private static function setNewId()


}
