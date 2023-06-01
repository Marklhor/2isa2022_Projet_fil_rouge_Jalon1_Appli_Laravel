<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use App\Models\TypePannes;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\session;
use App\Http\Controllers\MyUserController;

class TicketController extends Controller
{

    // *******************************************
    // liste l'ensemble des tickets
    // *******************************************
    public function getTickets()
    {
        if (!empty(session()->get('idUser') & !empty(session()->get('IsTecHotline')))) {
        // if (Auth::id()) { // TODO

            // $IsTecHotline = self::isTecHoline();
            // $IsTecHotline = $this->UserisTecHoline();
            // dd(session()->all());
            $db = new Ticket();
            $data = $db->getTickets();
            return view('tickets', ['data' => $data, 'IsTecHotline' => session()->get('IsTecHotline')]);
        }
    }

    // *******************************************
    // Liste les tickets pour un utilisatuer suivant son Id
    // *******************************************
    public function getMyTickets(Request $request, $idUser)
    {
        
        // MyUserController::getUserIdToSession($request->user()->id);

        $db = new Ticket();
        $data = $db->getMyTickets(session()->get('idUser'));
        // dd($data);

        return view('tickets', ['data' => $data]);
    }

    public function getNewTicket()
    {
        $dbPannes = new TypePannes();
        $ListePannes = $dbPannes->getAllFailures();

        // dd(session()->all());
        return view('newticket', ['liste_pannes' => $ListePannes]);
    }


    public function postNewTicket(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|min:2',
            'sujet' => 'required|min:2'
        ]);

        $newIdTicket = self::getNewID();
        $newIdMessage = MessageController::getNewID();
        $idUser = session()->get('idUser');
        $Sujet = strval($request->input('sujet'));
        $PanneType = (int)$request->input('panne_type');
        $Message = strval($request->input('message'));

        if ($Sujet != Null | $PanneType != Null | $Message != Null) {
            $dbNewTicket = new Ticket();
            $NewTicket = $dbNewTicket->postMyTicket($newIdTicket, $newIdMessage, $Sujet, $PanneType, $idUser, $Message);
            if ($NewTicket) {
                return redirect()->route('ticket', ['nb' => $newIdTicket]);
            } else {
                session()->flash('error', "Votre nouvel incident n'est pas enregistré suite à une erreur de la base de données.\nVeuillez recommencer");
                return redirect()->route('newticket');
            }
        } else {
            session()->flash('error', "Votre nouvel incident n'est pas enregistré, il existe une erreur dans vos données envoyées à la base de données.\nVeuillez recommencer");
            return redirect()->route('newticket');
        }
    }

    public function updateToCloseThisTicket(int $IdTicket){

        $dbTicket = new Ticket();
        $data  = $dbTicket->updateToCloseThisTicket($IdTicket);
        if ($data) {
            session()->flash('success', "L'incident est clôturé");
        }else{
            session()->flash('error', "L'incident n'est pas clôturé");
        }
        return redirect()->route('ticket', ['nb' => $IdTicket]);
    }

    //défini si le user de la session est un techotline ou non
    private function UserisTecHoline()
    {
        $MyUser = new MyUser();
        $data = $MyUser->isTecHoline();
        if ($data[0]->IdRole = 77002) {
            return true;
        } else {
            return false;
        }
    }
    // Définition du nouvel Id pour le message
    private static function getNewID()
    {
        $IdMax = TICKET::getMaxId();
        return $IdMax->max + 1;
    }


    
}
