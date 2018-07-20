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

//HABITAT TOUS
Route::any("/habitats", "HabitatController@index")->name("searchHabitat");
Route::any("/habitat/get_champs_categorie", "HabitatController@get_champs_categorie");
Route::any("/habitat/create", "HabitatController@create");
Route::any("/habitat/store", "HabitatController@store")->name("storeHabitat");
Route::any("/habitat/{idHabitat}", "HabitatController@show")->name("showHabitat");
Route::any("/habitat/{idHabitat}/allReservations", "HabitatController@seeReservations")->name("allReservations");

Route::any("/habitat/{idHabitat}/checkHabitat", "HabitatController@checkHabitat")->name("checkHabitat");
Route::any("/habitat/{idHabitat}/delete", "HabitatController@delete");
Route::any("/habitat/{idHabitat}/edit", "HabitatController@edit");
Route::any("/habitat/{idHabitat}/sendMessage", "HabitatController@send_message")->name("sendMessage");
Route::any("/habitat/{idHabitat}/update", "HabitatController@update")->name("updateHabitat");

//HABITAT ACTIVITE
Route::any("/activite/store", "ActiviteController@store")->name("storeActivite");
Route::any("/activite/{idHabitat}/create", "ActiviteController@create")->name("creerActivite");

//HABITAT GERANT
Route::any("/habitats/edit", "HabitatController@edit_habitats_gerant")->name("editHabitatsGerant");
Route::any("/habitats/update", "HabitatController@update_habitats_gerant")->name("updateHabitatsGerant");
Route::any("/habitats/get_enums", "HabitatController@get_enums_categorie")->name("getEnumsCategorie");
Route::any("/habitats/delete_enum", "HabitatController@delete_enum")->name("deleteEnum");


//RESERVATION
Route::any("/reservation/{idReservation}/commentStay", "ReservationController@comment_stay")->name("commentStay");
Route::any("/reservation/{idReservation}/deleteComment", "ReservationController@delete_comment")->name("deleteComment");
Route::any("/reservation/{idHabitat}/makeReservation", "ReservationController@make")->name("makeReservation");
Route::any("/reservation/{idReservation}", "ReservationController@show")->name("showReservation");
Route::any("/reservation/{idHabitat}/storeReservation", "ReservationController@store")->name("storeReservation");

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
Route::any('/home/{idUser}/disableAccount', 'HomeController@disable_account')->name('disableAccount');
