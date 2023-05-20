<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TicketController;
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
Route::get('/mesincidents/{idUser}', [TicketController::class, 'getMyTicket', ['idUser' => '82001', 'all' => true]])->name('mytickets'); //TODO get user id for model request
Route::get('/incidents', [TicketController::class, 'getTickets', ['all' => true]])->name('tickets');
Route::get('/signaler', [TicketController::class, 'getNewTicket'])->name('newticket');

Route::get('/incident/{nb}', [MessageController::class, 'getAllMessagesForTicket', ['idincident' => $nb, 'hotline' => true]])->where('nb', '^[0-9]{5}')->name('ticket');


// ajout suivant:  https://code.tutsplus.com/tutorials/how-to-create-a-phpmysql-powered-forum-from-scratch-in-laravel--cms-106705
Route::get('/register/index', 'RegistrationController@index');
Route::post('register/save', 'RegistrationController@save');
Route::get('/login/index', 'LoginController@index');
Route::post('/login/checkErrors', 'LoginController@checkErrors');
Route::get('/logout', 'LoginController@logout');

Route::get('/topic/create', 'TopicController@create');
Route::post('/topic/save', 'TopicController@save');
Route::get('/', 'TopicController@index');
Route::get('/topic/index', 'TopicController@index');
Route::get('/topic/detail/{id}', 'TopicController@detail');
Route::post('/reply/save', 'TopicController@replySave');
// ------------------------------------------------------------
