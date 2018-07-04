<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('habitat', 'HabitatController');
Route::resource('membre', 'MembreController');
Route::resource('activite', 'ActiviteController');
Route::resource('categorie', 'CategorieController');
Route::resource('facture', 'FactureController');
Route::resource('message', 'MessageController');
Route::resource('reservation', 'ReservationController');
Route::resource('image', 'ImageController');
Route::resource('etatreservation', 'EtatReservationController');
Route::resource('transaction', 'TransactionController');
Route::resource('typetransaction', 'TypeTransactionController');
Route::resource('habitatactivite', 'HabitatActiviteController');
