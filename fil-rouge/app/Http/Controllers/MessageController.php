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
        Controller::forgetItemsSession();
        session(['idTicket' => $IdTicket]);

        // Création d'une instance du modèle Message
        $dbMsg = new Message();

        // Appel de la méthode du modèle
        $data = $dbMsg->getAllMessagesForTicket($IdTicket);
        if (!empty($data)) {
            if (!session()->get('IsTecHotline') || $data[0]->id_user != session()->get('idUser')) {
                session(['errordb' => "Vous n'êtes pas autorisé à accéder à cette page"]);
            }
        } else {
            if (session()->get('IsTecHotline')) {
                session(['errordb' => "Cet incident a aucun message ou n'existe pas. Voir avec l'auteur et ou supprimer ce message de la base de données"]);
            }else{
                session(['errordb' => "Cet incident a aucun message ou n'existe pas. Veuillez contactez le service informatique"]);
            }
            return view('errordb');
        }
        return view('ticket', ['data' => $data]);
        // session(['errordb' => "Veuillez contacter votre gestionnaire de park informatique"]);
        // return view('errordb');
    }

    /**
     * Ajoute un message à un incident
     * 
     * @param Request $request provenant du formulaire en post
     * @return redirect route ticket, vue des message du ticket
     */
    // 
    public function postMysMessage(Request $request)
    {
        Controller::forgetItemsSession();

        // Vérifications de données de la requête
        $this->validate($request, [
            'message' => 'required|string|max:2'
        ]);
        $Message = strval($request->input('message'));
        if (Str::length($Message) >= 2) {
            $dbMsg = new Message();
            // Appel de la méthode postMysMessage du modèle
            $NewMessage = $dbMsg->postMyMessage($Message, self::getNewID());
            if ($NewMessage == 0) {
                session()->flash('error', "Votre nouveau message n'est pas enregistré suite à une erreur de la base de données.\nVeuillez recommencer");
            } 
        } else {
            session()->flash('error', "Votre nouveau message n'est pas enregistré, il existe une erreur dans vos données envoyées.\nVeuillez recommencer");
        }
        return redirect()->route('ticket', ['nb' => session()->get('idTicket')]);
    }

    // Définition du nouvel Id pour le message
    public static function getNewID()
    {
        $IdMax = Message::getMaxId();
        return $IdMax->max + 1;
    }
}
