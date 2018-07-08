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
    return view('layout');
});


Route::any("/habitats", "HabitatController@index");
Route::any("/habitat/create", "HabitatController@create");
Route::any("/habitat/store", "HabitatController@store")->name("storeHabitat");
Route::any("/habitat/{idHabitat}", "HabitatController@show")->name("showHabitat");
Route::any("/habitat/{idHabitat}/edit", "HabitatController@edit");
Route::any("/habitat/{idHabitat}/update", "HabitatController@update")->name("updateHabitat");
Route::any("/habitat/{idHabitat}/delete", "HabitatController@delete");

Route::any("/activite/store", "ActiviteController@store")->name("storeActivite");
Route::any("/activite/create", "ActiviteController@create")->name("creerActivite");



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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
