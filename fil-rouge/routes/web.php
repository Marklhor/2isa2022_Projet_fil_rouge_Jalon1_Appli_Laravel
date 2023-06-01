<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TicketController;
use App\Models\MessagesTicket;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MyUserController;
 

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
// - variables de routes, de session et de méthode de class -> pascalCase
// - autres variables -> CamelCase
// - variables de l'uri et nom de route -> minuscul sans symboles
//
// URI vs CODE :
// - dans les URI le terme employé pour un ticket est 'incident"



// *******************************************
// FORTIFY ROUTE
// *******************************************
// Route::get('/', function () {
//     return view('welcome'); // page d'accueil apès connexion
// })->name('home');

Route::get('/', function () {
    return view('connexion'); // page d'accueil apès connexion
})->name('home');

// route::get('/register',  [MyUserController::class, 'newUser']);


Route::get('home', function(Request $request){ 
    // dd(Auth::id());
    // dd($request->user()->id);
    // dd($request->session());
    // return redirect()->route('mytickets',['iduser' => $request->user()->id]);
    // return view('tickets'); 
    
    // return redirect()->route('redirect');
    return MyUserController::choiseHomePageToRoleAndSetSession(Auth::id());

})->middleware('auth'); 
// ->middleware('auth') => à la fin de chaque route pour obligé à l'athentification


// Route::get('/redirect', [MyUserController::class, 'choiseHomePageToRoleAndSetSession', ['idUser'=> Auth::id()]])->middleware('auth')->name('redirect');




// *******************************************
// Test
// *******************************************
// session(['idUser' => 82001]);
// session(['idUser' => 96101]);
//
// test Route
Route::get('/test',function () 
{
    return 'tets';
})->middleware('auth');

// *******************************************
// variables d'initialisation pour les routes
// utilité, ou autres méthodes, bonnes pratiques ? TODO
// *******************************************
$nb = 11111; // 99006, 99304
$iduser = 82001; // techHotline : 96101
// $iduser = 96101; // techHotline : 96101

// *******************************************
// Routes les listes des incidents, tickets, soit celle d'un utilisateur, soit celle de l'ensemble
// *******************************************
Route::get('/mesincidents/{iduser}', [TicketController::class, 'getMyTickets', ['idUser' => session()->get('idUser')]])->where('iduser', '^[0-9]{5}')->middleware('auth')->name('mytickets');
Route::get('/incidents', [TicketController::class, 'getTickets'])->middleware('auth')->name('tickets');

// *******************************************
// Routes de signalement d'un incident
// *******************************************
Route::get('/signaler', [TicketController::class, 'getNewTicket'])->middleware('auth')->name('newticket');
Route::post('/signaler', [TicketController::class, 'postNewTicket'])->middleware('auth')->name('postnewticket');

// *******************************************
// Route pour visualiser un incident suivant son Id et pour poster un message
// *******************************************
Route::get('/incident/{nb}', [MessageController::class, 'getAllMessagesForTicket', ['idincident' => $nb]])->where('nb', '^[0-9]{5}')->middleware('auth')->name('ticket');
Route::post('/incident/{nb}', [MessageController::class, 'postMysMessage', ['idincident' => $nb]])->where('nb', '^[0-9]{5}')->middleware('auth')->name('postmessage');

// *******************************************
// Route pour cloturer un incident, uniquement accessible par les TecHotline TODO
// *******************************************
Route::post('/incident/close/{nb}', [TicketController::class, 'updateToCloseThisTicket', ['idincident' => $nb]])->where('nb', '^[0-9]{5}')->middleware('auth')->name('closeticket');

