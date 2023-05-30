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

    // poster un message sur un incident
    public function postMysMessage(Request $request)
    {
        // Vérifications de données de la requête
        $this->validate($request, [
            'message' => 'required|min:2'
        ]);
        $Message = strval($request->input('message'));
        if ($Message != Null) {
            $dbMsg = new Message();

            // Appel de la méthode postMysMessage du modèle
            $NewMessage = $dbMsg->postMyMessage($Message, self::getNewID());
            if ($NewMessage) {
                # code...
                // dd($Message);
                return redirect()->route('ticket', ['nb' => session()->get('idTicket')])->middleware('auth');
                // route('ticket', ['nb' => session()->get('idTicket')]);
            } else {
                session()->flash('error', "Votre nouveau message n'est pas enregistré suite à une erreur de la base de données.\nVeuillez recommencer");
                return redirect()->route('ticket', ['nb' => session()->get('idTicket')])->middleware('auth');
            }

            // redirection vers la route ticket (même page)
        } else {
            # code...
            session()->flash('error', "Votre nouveau message n'est pas enregistré, il existe une erreur dans vos données envoyées à la base de données.\nVeuillez recommencer");
            return redirect()->route('ticket', ['nb' => session()->get('idTicket')])->middleware('auth');
        }
        // Création d'une instance du modèle Message

    }

    // Définition du nouvel Id pour le message
    public static function getNewID()
    {
        $IdMax = Message::getMaxId();
        return $IdMax->max + 1;
    }
}
