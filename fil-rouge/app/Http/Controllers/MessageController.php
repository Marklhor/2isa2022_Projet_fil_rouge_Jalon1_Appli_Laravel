<?php

namespace App\Http\Controllers;

use App\Models\Message;
// use App\Models\MessagesTicket;
// use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    // obtenir l'ensemble des message pour un incident
    public function getAllMessagesForTicket($IdTicket)
    {
        // Definition des éléments de la session
        session(['idTicket' => $IdTicket]);

        // Création d'une instance du modèle Message
        $dbMsg = new Message();

        // Appel de la méthode du modèle
        $data = $dbMsg->getAllMessagesForTicket($IdTicket);

        // Affichage de la page d'un incident, un ticket
        return view('ticket', ['data' => $data]);
    }

    // poster un message à un incident
    public function postMysMessage(Request $request) : void
    {
        // Vérifications de données de la requête
        $this->validate($request, [
            'message' => 'required|min:2'
        ]);

        // Création d'une instance du modèle Message
        $dbMsg = new Message();

        // Appel de la méthode postMysMessage du modèle
        $data = $dbMsg->postMyMessage($request->get('message'), self::getNewID() );

        // redirection vers la route ticket (même page)
        route('ticket',['nb' => session()->get('idTicket')]);
    }

    // Définition du nouvel Id pour le message
    private static function getNewID(){
        $IdMax = Message::getMaxId();
        return $IdMax[0]->max + 1;
    }
}
