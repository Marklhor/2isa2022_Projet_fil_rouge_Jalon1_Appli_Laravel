<?php

namespace App\Http\Controllers;

use App\Models\Message;
// use App\Models\MessagesTicket;
// use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'message' => 'required|min:2'
        ]);
        // dd($request);
        // *******************************************
        // Création d'une instance du modèle Message
        // *******************************************
        $dbMsg = new Message();
        // *******************************************
        // Appel de la méthode postMysMessage du modèle
        // *******************************************
        $data = $dbMsg->postMyMessage($request->get('message'));
        // $dbMsgTck = new MessagesTicket();
        // $dbMsgTck->postInLinkTableMsgTck(session()->get('idTicket'), Message::getNewId(false));
        dd($data);
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
