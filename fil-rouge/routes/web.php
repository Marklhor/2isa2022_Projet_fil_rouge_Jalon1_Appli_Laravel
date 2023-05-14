<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/home_si', function () {
    return view('layout', ['title_head' => 'Servive informatique AMIO - gestion des incidents']);
})->name('home_si');

// $url = route('home_si');

Route::get('/test', function () {
    return 'ça marche';
});