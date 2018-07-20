<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Http\Repositories\HabitatRepository;
use App\Http\Repositories\ReservationRepository;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;

class ReservationController extends Controller 
{

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

  public function comment_stay($id, ReservationRepository $reservationRepository)
  {

    $reservationRepository->commentStay(
      $id,
      $_POST['commentaire_reservation']
    );

    Session::flash('message', 'Commentaire envoyé avec succès!');

    return Redirect::to('reservation/'.$id);
  }
  
  public function delete_comment($id, ReservationRepository $reservationRepository){
    $reservationRepository->deleteComment($id);

    Session::flash('message', 'Commentaire supprimé avec succès!');

    return Redirect::to('reservation/'.$id);
  }
  
}

?>