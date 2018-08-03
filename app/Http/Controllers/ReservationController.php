<?php 

namespace App\Http\Controllers;

use App\Http\Repositories\HabitatRepository;
use App\Http\Repositories\ReservationRepository;
use App\Http\Requests\ReservationRequest;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;
use \Input as Input;

class ReservationController extends Controller 
{

  use Helpers;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index($id, HabitatRepository $habitatRepository)
  {
    $reservationsByHabitat = $habitatRepository->getReservationsByHabitat($id);

    return view('reservations')->with('reservations', $reservationsByHabitat);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function make($id, HabitatRepository $habitatRepository)
  {

    $habitat = $habitatRepository->getHabitat($id);

    return view("create_reservation")->with("habitat", $habitat);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ReservationRequest $reservationRequest, ReservationRepository $reservationRepository)
  {
    $validated = $reservationRequest->validated();
    $idHabitat = $_POST["habitat_id"];
    $idLocataire = Auth::user()->id;

    $reservationRepository->makeReservation(
      $_POST["date_debut_reservation"],
      $_POST["date_fin_reservation"],
      $_POST["participants_reservation"],
      $idHabitat,
      $idLocataire
    );

    Session::flash('message', 'Réservation faite avec succès');
    return Redirect::to('reservation/'.$idHabitat.'/makeReservation');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id, ReservationRepository $reservationRepository)
  {
    $reservation = $reservationRepository->getReservationById($id);

    return view('reservation')->with('reservation', $reservation);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

  public function comment_stay(Request $request, $id, ReservationRepository $reservationRepository)
  {

    $validatedData = $request->validate([
      'commentaire_reservation' => 'required',
    ]);

    $this->api->post('api/reservation/'.$id.'/commentStay', $validatedData);
    

    Session::flash('message', 'Commentaire envoyé avec succès!');

    return Redirect::to('reservation/'.$id);
  }
  
  public function delete_comment($id, ReservationRepository $reservationRepository){
    $reservationRepository->deleteComment($id);

    Session::flash('message', 'Commentaire supprimé avec succès!');

    return Redirect::to('reservation/'.$id);
  }

  public function post_image(Request $request, $id){

    $validatedData = $request->validate([
      'url_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if($request->hasFile('url_image')){
      $url_image = $request->url_image;
      $new_url = rand().'.'.$url_image->getClientOriginalExtension();
      $url_image->move('images', $new_url);
    }

    $this->api->post('api/reservation/'.$id.'/postImage', $new_url);

    return Redirect::to('reservation/'.$id);
  }
  
}

?>