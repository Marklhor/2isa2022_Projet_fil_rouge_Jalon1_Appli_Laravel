<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class MessagesTicket extends Model
{
    use HasFactory;

    protected $table = 'MESSAGES_TYCKET';


    public function postInLinkTableMsgTck(int $IdTicket, int $IdMessage){
        $dbInsert = DB:: insert("INSERT INTO MESSAGES_TYCKET (IdMessage, IdTicket) values(?,?)",[$IdTicket,$IdMessage]);
        route('ticket',['nb' => $IdTicket]);
    }
}
