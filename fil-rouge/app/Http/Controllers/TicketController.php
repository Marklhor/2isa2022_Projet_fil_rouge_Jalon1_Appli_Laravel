<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use App\Models\TypePannes;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\session;

class TicketController extends Controller
{

    // *******************************************
    // liste l'ensemble des tickets
    // *******************************************
    public function getTickets()
    {
        if (!empty(session()->get('idUser'))) {

            // $IsTecHotline = self::isTecHoline();
            $IsTecHotline = $this->UserisTecHoline();
            // dd(session()->all());
            $db = new Ticket();
            $data = $db->getTickets();
            // dd($data);
            return view('tickets', ['data' => $data, 'IsTecHotline' => $IsTecHotline]);
        }
    }

    // *******************************************
    // Liste les tickets pour un utilisatuer suivant son Id
    // *******************************************
    public function getMyTickets($idUser)
    {

        // $dblistId = new MyUser();
        // récupère l'ide de l'utilisateur ou vide si non existant
        $IsUser = MyUser::getAllUserId($idUser);
        // dd($IsUser);

        // si utilisateur existant
        // if(!empty($IsUser) && $IsUser->id == $idUser){
        // dd($IsUser);
        /*
            * Definition des éléments de la session
            */
        session(['idUser' => $idUser]);

        //dd(session()->all());
        $db = new Ticket();
        $data = $db->getMyTickets(session()->get('idUser'));
        return view('tickets', ['data' => $data]);
        // }else{
        //     abort(404, "Erreur sur l'identité de l'utilisateur");
        // }



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
        // dd($request);

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

        // $test = [$Sujet, $PanneType, $idUser, $Message];
        // dd($test);

        if ($Sujet != Null | $PanneType != Null | $Message != Null) {
            # code...
            $dbNewTicket = new Ticket();
            $NewTicket = $dbNewTicket->postMyTicket($newIdTicket, $newIdMessage, $Sujet, $PanneType, $idUser, $Message);
            if ($NewTicket) {
                # code...
                return redirect()->route('ticket', ['nb' => $newIdTicket]);
            } else {
                # code...
                session()->flash('error', "Votre nouvel incident n'est pas enregistré suite à une erreur de la base de données.\nVeuillez recommencer");
                return redirect()->route('newticket');
            }
        } else {
            # code...
            session()->flash('error', "Votre nouvel incident n'est pas enregistré, il existe une erreur dans vos données envoyées à la base de données.\nVeuillez recommencer");
            return redirect()->route('newticket');
        }
    }

    public function updateToCloseThisTicket(int $IdTicket){
        // dd('ici');

        $dbTicket = new Ticket();
        $data  = $dbTicket->updateToCloseThisTicket($IdTicket);
        session()->flash('success', "L'incident est clôturé");
        return redirect()->route('ticket', ['nb' => $IdTicket]);
    }

    //défini si le user de la session est un techotline ou non
    private function UserisTecHoline()
    {
        $MyUser = new MyUser();
        $data = $MyUser->isTecHoline();
        // dd($data);
        if ($data[0]->IdRole = 77002) {
            // dd($data);
            return true;
        } else {
            return false;
        }
    }
    // Définition du nouvel Id pour le message
    private static function getNewID()
    {
        $IdMax = TICKET::getMaxId();
        // dd($IdMax);
        return $IdMax->max + 1;
    }
}
