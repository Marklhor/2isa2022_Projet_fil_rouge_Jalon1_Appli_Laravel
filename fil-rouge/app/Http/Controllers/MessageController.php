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

    public function postMysMessage(Request $request) : void
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



        // dd($IdMax[0]->max + 1);
        // $test = (float)$IdMax + 1;
        // dd($test);
        // *******************************************
        // Appel de la méthode postMysMessage du modèle
        // *******************************************
        // dd($request->get('message'));

        $data = $dbMsg->postMyMessage($request->get('message'), self::getNewID() );
        // $dbMsgTck = new MessagesTicket();
        // $dbMsgTck->postInLinkTableMsgTck(session()->get('idTicket'), Message::getNewId(false));
        //dd($data);
        // *******************************************
        // Appel de la méthode postInLinkTableMsgTck du modèle
        // *******************************************
        // $dbMsg->postInLinkTableMsgTck(session()->get('idTicket'), Message::getNewId(false));

        // *******************************************
        // Appel de la méthode getAllMessagesForTicket du controller
        // *******************************************
        // $this->getAllMessagesForTicket(session()->get('idTicket'));

        route('ticket',['nb' => session()->get('idTicket')]);
    }

    private static function getNewID(){

        /*
        * Définition du nouvel Id pour le message
        */
        // $dbId = new Message();
        $IdMax = Message::getMaxId();
        return $IdMax[0]->max + 1;
    }
}
