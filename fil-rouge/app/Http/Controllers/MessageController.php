<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessagesTicket;
// use App\Models\Ticket;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getAllMessagesForTicket($IdTicket)
    {
        session(['idTicket' => $IdTicket]);
        $dbMsg = new Message();
        $data = $dbMsg->getAllMessagesForTicket($IdTicket);
        // $dbTicket = new Ticket();
        // $dataTckt = $dbTicket->getTicketsForVueIncident($IdTicket);

        // dd($data);
        return view('ticket', ['data' => $data]); //, 'dataTckt' => $dataTckt]);
    }

    public function postMysMessage(Request $request) :void
    {
        // session(['id' => '007']); // test
        dd($request->session()->all());
        $this->validate($request, [
            'message' => 'required|nim:2'
        ]);

        $dbMsg = new Message();
        $dbMsg->postMysMessage($request->all);
        $dbMsgTck = new MessagesTicket();
        $dbMsgTck->postInLinkTableMsgTck(session()->get('idTicket'), Message::getNewId(false));

        $this->getAllMessagesForTicket(session()->get('idTicket'));

    }
}
