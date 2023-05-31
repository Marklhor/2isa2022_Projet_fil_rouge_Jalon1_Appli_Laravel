<?php

namespace App\Http\Controllers;

use App\Models\Message;
// use App\Models\MessagesTicket;
// use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     *  Obtenir l'ensemble des message pour un incident
     * 
     * @param int $IdTicket  Identifdiant du ticket
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory Retourne la vue pour afficher de tous les tickets
     */
    public function getAllMessagesForTicket(int $IdTicket)
    {
        // Definition des éléments de la session
        session(['idTicket' => $IdTicket]);
        // dd(session('idTicket'));

        // Création d'une instance du modèle Message
        $dbMsg = new Message();

        // Appel de la méthode du modèle
        $data = $dbMsg->getAllMessagesForTicket($IdTicket);
        dd($data);
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
                return redirect()->route('ticket', ['nb' => session()->get('idTicket')]);
                // route('ticket', ['nb' => session()->get('idTicket')]);
            } else {
                session()->flash('error', "Votre nouveau message n'est pas enregistré suite à une erreur de la base de données.\nVeuillez recommencer");
                return redirect()->route('ticket', ['nb' => session()->get('idTicket')]);
            }

            // redirection vers la route ticket (même page)
        } else {
            # code...
            session()->flash('error', "Votre nouveau message n'est pas enregistré, il existe une erreur dans vos données envoyées à la base de données.\nVeuillez recommencer");
            return redirect()->route('ticket', ['nb' => session()->get('idTicket')]);
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
