<?php

namespace App\Http\Controllers;

use App\Models\Message;
// use App\Models\MessagesTicket;
// use App\Models\Ticket;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getAllMessagesForTicket($IdTicket)
    {
        // *******************************************
        // Definition des éléments de la session
        // *******************************************
        session(['idTicket' => $IdTicket]);
        // *******************************************
        // Création d'une instance du modèle Message
        // *******************************************
        $dbMsg = new Message();
        // *******************************************
        // Appel de la méthode du modèle
        // *******************************************
        $data = $dbMsg->getAllMessagesForTicket($IdTicket);

        // dd($data); // Débugage

        // *******************************************
        // Affichage de la page d'un incident, un ticket
        // *******************************************
        return view('ticket', ['data' => $data]);
    }

    public function postMysMessage(Request $request): void
    {
        //dd($request->session()->all());

        // *******************************************
        // Vérifications de données de la requête
        // *******************************************
        $this->validate($request, [
            'message' => 'required|nim:2'
        ]);
        // *******************************************
        // Création d'une instance du modèle Message
        // *******************************************
        $dbMsg = new Message();
        // *******************************************
        // Appel de la méthode postMysMessage du modèle
        // *******************************************
        $dbMsg->postMyMessage($request->all);
        // $dbMsgTck = new MessagesTicket();
        // $dbMsgTck->postInLinkTableMsgTck(session()->get('idTicket'), Message::getNewId(false));

        // *******************************************
        // Appel de la méthode postInLinkTableMsgTck du modèle
        // *******************************************
        // $dbMsg->postInLinkTableMsgTck(session()->get('idTicket'), Message::getNewId(false));

        // *******************************************
        // Appel de la méthode getAllMessagesForTicket du controller
        // *******************************************
        $this->getAllMessagesForTicket(session()->get('idTicket'));
    }
}
