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

// *******************************************
// NOTE NOMMAGE
// *******************************************
// NOM DES VARIABLES :
// - variables de routes, de session et les méthodes de class -> pascalCase
// - autres variables -> CamelCase
// - variables de l'uri et nom de route -> minuscul sans symboles
//
// URI vs CODE :
// - dans les URI le terme employé pour un ticket est 'incident"


Route::get('/', function () {
    return view('connexion');
})->name('connexion');

// *******************************************
// Test
// *******************************************
// session(['idUser' => 82001]);
session(['idUser' => 96101]);


// *******************************************
// variables d'initialisation pour les routes
// utilité, ou autres méthodes, bonnes pratiques ? TODO
// *******************************************
$nb = 11111; // 99006, 99304
// $iduser = 82001; // techHotline : 96101
$iduser = 96101; // techHotline : 96101

// *******************************************
// Routes les listes des incidents, tickets, soit celle d'un utilisateur, soit celle de l'ensemble
// *******************************************
Route::get('/mesincidents/{iduser}', [TicketController::class, 'getMyTicket', ['idUser' => session()->get('idUser')]])->where('iduser', '^[0-9]{5}')->name('mytickets');
Route::get('/incidents', [TicketController::class, 'getTickets'])->name('tickets');

// *******************************************
// Routes de signalement d'un incident
// *******************************************
Route::get('/signaler', [TicketController::class, 'getNewTicket'])->name('newticket');
Route::post('/signaler', [TicketController::class, 'getNewTicket'])->name('postnewticket');

// *******************************************
// Route pour visualiser un incident suivant son Id et pour poster un message
// *******************************************
Route::get('/incident/{nb}', [MessageController::class, 'getAllMessagesForTicket', ['idincident' => $nb]])->where('nb', '^[0-9]{5}')->name('ticket');
Route::post('/incident/{nb}', [MessageController::class, 'postMysMessage', ['idincident' => $nb]])->where('nb', '^[0-9]{5}')->name('postmessage');
//route de passage pour insérer des données dans la table de liaison MESSAGES_TYCKET
// Route::get('/intermed/messages_ticket', [MessagesTicket::class, 'postInLinkTableMsgTck', ['IdTicket', 'IdMessage']])->name('msgtckt');


// test
Route::get('/test',[TicketController::class, 'isTecHoline']);
