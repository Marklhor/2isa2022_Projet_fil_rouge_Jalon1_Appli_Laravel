<?php

use App\Http\Controllers\TicketController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('connexion');
})->name('connexion');

Route::get('/employees', [TicketController::class, 'listOfTickets'])->name('tickets.list');
Route::get('/employee', [TicketController::class, 'selectTicket'])->name('select.ticket');
Route::post('/employee', [TicketController::class, 'getTicketById'])->name('ticket.detail');

Route::get('/incidents', [TicketController::class, 'getTicketsForVueIncidents'])->name('tickets');

// ------------------------------------------------------------
// Route::get('/techotline', function () {
//     return view('incidents',['hotline'=>true,'all'=>true]);
// })->name('tous_les_incidents');


// Route::controller(IncidentController::class)->group(function(){
//     session()->put('hotline',true);
//     session()->put('all',true);
//     Route::get('/techotline','All_Tickets');
//     })->name('tous_les_incidents');


// Route::get('/techotline', function () {
//     return view('incidents',['hotline'=>true,'all'=>true]);
// })->name('tous_les_incidents');
// ------------------------------------------------------------


// ------------------------------------------------------------
// Route::get('/techotline/{nb}', function ($nb) {
//     return view('incident',['hotline'=>true,'id_incident'=>$nb]);
// })->name('un_incident');
// ------------------------------------------------------------


// ------------------------------------------------------------

// Route::get('/user/{n}', function ($n) {
//     return view('incidents',['hotline'=>false,'all'=>false,'id_user' => $n]);
// })->name('mes_incidents');

// Route::get('/user/{n}/new', function ($n) {
//     return view('incident',['hotline'=>false,'id_user' => $n,'new'=>true]);
// })->name('creer_un_nouveau_incident');

// Route::get('/user/{n}/{nb}', function ($n,$nb) {
//     return view('incident',['hotline'=>false,'id_user' => $n,'id_incident'=>$nb]);
// })->name('mon_incidentt');

// Route::get('/logout', function ($n,$nb) {
//     return view('logout');
// })->name('me_deconnecter');
// ------------------------------------------------------------
