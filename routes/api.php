<?php

use Dingo\Api\Routing\Router;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app(Router::class);

$api->version('v1', [], function(Router $api) {
	$api->get('habitats', 'App\Http\Controllers\Api\V1\HabitatController@get_habitats');
	$api->get('habitat/{id}', 'App\Http\Controllers\Api\V1\HabitatController@get_habitat');
	$api->get('habitatsByCategorie/{id}', 'App\Http\Controllers\Api\V1\HabitatController@get_habitats_by_one_categorie');

	// HISTORIQUE DE RESERVATIONS
	$api->get('/habitats/proprietaire/{id}', 'App\Http\Controllers\Api\V1\HabitatController@get_habitats_by_owner');
	$api->get('/reservations/locataire/{id}', 'App\Http\Controllers\Api\V1\ReservationController@get_reservations_by_tenant');
	$api->get('/reservations/habitat/{id}', 'App\Http\Controllers\Api\V1\ReservationController@get_reservations_by_habitat');

	// COMMENTER UNE LOCATION
	$api->get('/reservation/{id}', 'App\Http\Controllers\Api\V1\ReservationController@get_reservation');
	$api->post('/reservation/{id}/commentStay', 'App\Http\Controllers\Api\V1\ReservationController@comment_stay');

	// POSTER UNE IMAGE
	$api->post('/reservation/{id}/postImage', 'App\Http\Controllers\Api\V1\ReservationController@post_image');

});

