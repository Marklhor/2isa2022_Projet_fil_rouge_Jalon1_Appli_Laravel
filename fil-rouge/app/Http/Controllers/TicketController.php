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
            $IsTecHotline = $this->UserisTecHoline(); // TODO
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
        return view('newticket',['liste_pannes'=> $ListePannes]);
    }


    public function postNewTicket(Request $request){ // TODO
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

        $test = [$Sujet, $PanneType, $idUser, $Message];
// dd($test);

        //if ($Sujet == Null | $PanneType == Null | $Message == Null ) {
            # code...
            $dbNewTicket = new Ticket();
            $NewTicket = $dbNewTicket->postMyTicket($newIdTicket, $newIdMessage, $Sujet, $PanneType, $idUser, $Message);
            // TODO test du retour de la requêtes
            $request->session()->flash('succes', 'Votre nouvel incident est posté avec succès'); //TODO
            
            return redirect()->route('ticket', ['nb' => $newIdTicket]);
        // }else{
        //     abort(404,"Erreur sur les données à envoyer"); // TODO
        // }

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
    private static function getNewID(){
        $IdMax = TICKET::getMaxId();
        // dd($IdMax);
        return $IdMax->max + 1;
    }
}
