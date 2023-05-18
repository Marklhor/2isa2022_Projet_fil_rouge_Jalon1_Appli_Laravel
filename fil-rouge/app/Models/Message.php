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
        return DB::select("SELECT mt.IdMessage as 'id_msg', st.Label as 'status_label', mt.IdTicket as 'id_ticket', um.Content as 'msg', u.id as 'id_user', u.Prenom as 'prenom', u.Nom as 'nom', um.CreateAt as 'Date message', t.CreatedAt as 'date création incident', t.UpdateAt as 'maj'
        From MESSAGES_TYCKET mt JOIN USERS_MESSAGES um ON mt.IdMessage = um.Id
            JOIN USERS u ON um.IdAuteur = u.Id
            JOIN TICKETS t ON mt.IdTicket = t.Id
            JOIN STATUS_TYPE st ON t.IdStatus = st.Id
        WHERE mt.IdTicket = ?", [$IdTicket]);
    }
}
