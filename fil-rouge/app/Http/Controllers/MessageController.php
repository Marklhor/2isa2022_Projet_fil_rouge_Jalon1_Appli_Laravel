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
        if (auth()->user()->id != NULL && !empty($data)) {
            if (!session()->get('IsTecHotline') && $data[0]->id_user != auth()->user()->id) {
                session(['errordb' => "Vous n'êtes pas autorisé à accéder à cette page"]);
                $data=[];
            }
        }else {
            if (session()->get('IsTecHotline')) {
                session(['errordb' => "Cet incident a aucun message ou n'existe pas. Voir avec l'auteur et ou supprimer ce message de la base de données"]);
            }else{
                session(['errordb' => "Cet incident a aucun message ou n'existe pas. Veuillez contactez le service informatique"]);
            }
            return view('errordb');
        }
        $isTicketOfThisTecHotline = false;
        $isTicketOfTecHotline = false;

        foreach ($data as $message) { // un seul tour
            if ($message->id_user == auth()->user()->id && session()->get('IsTecHotline')) {
                $isTicketOfThisTecHotline = true;
            }
            if ($message->id_role == 77002) {
                $isTicketOfTecHotline = true;
            }
            break;
        }
        return view('ticket', ['data' => $data , 'isTicketOfThisTecHotline' => $isTicketOfThisTecHotline , 'isTicketOfTecHotline'=> $isTicketOfTecHotline] );
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
        $Message ='';
        if (auth()->user()->id != NULL) {
            Controller::forgetItemsSession();
        
            // Vérifications de données de la requête
            $this->validate($request, [
                'message' => 'required|string|min:2'
            ]);
            $Message = strval($request->input('message'));
        }
        if ($Message != '') {
            $dbMsg = new Message();
            // Appel de la méthode postMysMessage du modèle
            $NewMessage = $dbMsg->postMyMessage($Message, self::getNewID());
            if ($NewMessage == 0) {
                session()->flash('error', "Votre nouveau message n'est pas enregistré suite à une erreur de la base de données.\nVeuillez recommencer");
            } 
        }else {
            session()->flash('error', "Votre nouveau message n'est pas enregistré, il existe une erreur dans vos données envoyées.\nVeuillez recommencer");
        }
        // dd($Message);
        return redirect()->route('ticket', ['nb' => session()->get('idTicket')]);
    }

    // Définition du nouvel Id pour le message
    public static function getNewID()
    {
        $IdMax = Message::getMaxId();
        return $IdMax->max + 1;
    }
}
