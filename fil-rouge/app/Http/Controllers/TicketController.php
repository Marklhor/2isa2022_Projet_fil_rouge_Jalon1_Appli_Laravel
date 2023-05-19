<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function getTickets()
    {
        $db = new Ticket();
        $data = $db->getTickets();
        // dd($data);
        return view('tickets', ['data' => $data]);
    }

    public function getMyTicket($idUser)
    {
        $db = new Ticket();
        $data = $db->getMyTicket($idUser);
        return view('tickets', ['data' => $data]);
    }



    public function listOfTickets()
    {
        /**
         * Création d'une instance du modèle EMP
         */
        $db = new Ticket();

        /**
         * Appel de la méthode getAll du modèle
         */
        $data = $db->getAll();

        //dd($data);
        return view('tickets', ['data' => $data]);
    }



    /**
     * Affichage de la page de selection d'employé
     */
    public function selectTicket()
    {
        return view('ticketById');
    }

    /**
     * Affichage du détail d'un employé
     */
    public function getTicketById(Request $request)
    {
        $name = $request->input('Id');

        $db = new Ticket();
        $data = $db->getTicketById($name);

        if (!is_null($data) && !empty($data)) {
            return view('ticketById', compact('data'));
        } else {
            return redirect(route('select.ticket'));
        }
    }


}
