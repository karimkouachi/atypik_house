<?php

namespace App\Http\Repositories;

use App\Http\Repositories\EtatReservationRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{    

	protected $reservation;
	protected $idEtat;

	public function __construct(Reservation $reservation, EtatReservationRepository $etatReservationRepository)
	{
		$this->reservation = $reservation;
		$this->idEtat = $etatReservationRepository->getEtatReservation('En attente');
	}

	public function makeReservation($date_debut_reservation, $date_fin_reservation, $participants_reservation, $commentaire_reservation, $habitat_id, $locataire_id)
	{
        $this->reservation->date_debut_reservation = $date_debut_reservation;
        $this->reservation->date_fin_reservation = $date_fin_reservation;
        $this->reservation->participants_reservation = $participants_reservation;
        $this->reservation->commentaire_reservation = $commentaire_reservation;
        $this->reservation->habitat_id = $habitat_id;
        $this->reservation->locataire_id = $locataire_id;
        $this->reservation->etat_reservation_id = $this->idEtat;

        $this->reservation->save();
	}

	public function getReservationsByTenantId($locataire_id){

		$reservationsByTenant = Reservation::where('locataire_id', $locataire_id)->get();

		return $reservationsByTenant;
	}

	public function getReservationsByHabitat($habitat_id){

		$reservationsByHabitat = Reservation::where('habitat_id', $habitat_id)->get();

		return $reservationsByHabitat;
	}

	public function getHabitat($id)
	{
        $reservations = Reservation::where('habitat_id', $id)->get();

        return $reservations;
	}
}