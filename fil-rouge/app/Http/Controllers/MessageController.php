<?php

namespace App\Http\Controllers;

use App\Models\Message;
// use App\Models\Ticket;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getAllMessagesForTicket($IdTicket)
    {
        $dbMsg = new Message();
        $data = $dbMsg->getAllMessagesForTicket($IdTicket);
        // $dbTicket = new Ticket();
        // $dataTckt = $dbTicket->getTicketsForVueIncident($IdTicket);

        // dd($data);
        return view('ticket', ['data' => $data]); //, 'dataTckt' => $dataTckt]);
    }
}
