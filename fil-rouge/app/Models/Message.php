<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;

    protected $table = 'USERS_MESSAGES';

    public function getAllMessagesForTicket(int $IdTicket)
    {
        /**
         * Utilisation de la façade DB::select
         */
        return DB::select("SELECT mt.IdMessage as 'id', t.sujet as 'sujet' ,st.Label as 'status_label', mt.IdTicket as 'id_ticket', um.Content as 'msg', u.id as 'id_user', CONCAT(u.Nom, ' ', LEFT(u.Prenom, 1), '.') AS 'nom', um.CreateAt as 'date_message', t.CreatedAt as 'date_de_creation', t.UpdateAt as 'date_de_maj', ur.IdRole as 'id_role'
        From MESSAGES_TYCKET mt JOIN USERS_MESSAGES um ON mt.IdMessage = um.Id
            JOIN USERS u ON um.IdAuteur = u.Id
            JOIN TICKETS t ON mt.IdTicket = t.Id
            JOIN STATUS_TYPE st ON t.IdStatus = st.Id
            JOIN USERS_ROLE ur ON um.IdAuteur = ur.IdUser
        WHERE mt.IdTicket = ?", [$IdTicket]);
    }

    public function postMysMessage(int $id, string $message){
        return DB:: INSERT(table (nom_colonne_1, nom_colonne_2, ...
        VALUES ('valeur 1', 'valeur 2', ...));
    }
}
