<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    // *******************************************
    // liste l'ensemble des tickets
    // *******************************************
    public function getTickets()
    {
        if (!empty(session()->get('idUser'))) {

            // $IsTecHotline = self::isTecHoline();
            $IsTecHotline = this->UserisTecHoline(); // TODO
            // dd(session()->all());
            $db = new Ticket();
            $data = $db->getTickets();
            dd($data);
            return view('tickets', ['data' => $data, 'IsTecHotline' => $IsTecHotline]);
        }
    }

    // *******************************************
    // Liste les tickets pour un utilisatuer suivant son Id
    // *******************************************
    public function getMyTicket($idUser)
    {
        /*
         * Definition des éléments de la session
         */
        session(['idUser' => $idUser]);

        //dd(session()->all());
        $db = new Ticket();
        $data = $db->getMyTicket(session()->get('idUser'));
        return view('tickets', ['data' => $data]);
    }

    public function getNewTicket()
    {
        return view('newticket');
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



    // public function listOfTickets()
    // {
    //     /**
    //      * Création d'une instance du modèle EMP
    //      */
    //     $db = new Ticket();

    //     /**
    //      * Appel de la méthode getAll du modèle
    //      */
    //     $data = $db->getAll();

    //     //dd($data);
    //     return view('tickets', ['data' => $data]);
    // }



    // /**
    //  * Affichage de la page de selection d'employé
    //  */
    // public function selectTicket()
    // {
    //     return view('ticketById');
    // }

    // /**
    //  * Affichage du détail d'un employé
    //  */
    // public function getTicketById(Request $request)
    // {
    //     $name = $request->input('Id');

    //     $db = new Ticket();
    //     $data = $db->getTicketById($name);

    //     if (!is_null($data) && !empty($data)) {
    //         return view('ticketById', compact('data'));
    //     } else {
    //         return redirect(route('select.ticket'));
    //     }
    // }


}
