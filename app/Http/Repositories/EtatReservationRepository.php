<?php

namespace App\Http\Repositories;

use App\Models\EtatReservation;

class EtatReservationRepository implements EtatReservationRepositoryInterface
{    

	protected $etat_reservation;

	public function __construct(EtatReservation $etat_reservation)
	{
		$this->etat_reservation = $etat_reservation;
	}

	public function getEtatReservation($libelleEtat)
	{
		$etat_reservation = EtatReservation::where('libelle_etat', $libelleEtat)->first();
		$idEtat = $etat_reservation->id;

		return $idEtat;
	}
}