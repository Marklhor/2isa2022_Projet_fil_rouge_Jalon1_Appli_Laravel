<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TicketController;
use App\Models\MessagesTicket;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('connexion');
})->name('connexion');


$nb = 11111;
$iduser = 82002;
Route::get('/mesincidents/{iduser}', [TicketController::class, 'getMyTicket', ['idUser' => $iduser, 'all' => true]])->name('mytickets');
Route::get('/incidents', [TicketController::class, 'getTickets', ['all' => true]])->name('tickets');
Route::get('/signaler', [TicketController::class, 'getNewTicket'])->name('newticket');

Route::get('/incident/{nb}', [MessageController::class, 'getAllMessagesForTicket', ['idincident' => $nb, 'hotline' => true]])->where('nb', '^[0-9]{5}')->name('ticket');
Route::post('/incident/{nb}', [MessageController::class, 'postMysMessage', ['idincident' => $nb]])->name('postmessage');
//route de passage pour insérer des données dans la table de liaison MESSAGES_TYCKET
Route::get('/intermed/messages_ticket', [MessagesTicket::class, 'postInLinkTableMsgTck', ['IdTicket', 'IdMessage']])->name('msgtckt');
