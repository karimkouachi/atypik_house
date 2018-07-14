<?php

namespace App\Http\Repositories;

interface ReservationRepositoryInterface
{
	public function makeReservation($date_debut_reservation, $date_fin_reservation, $participants_reservation, $commentaire_reservation, $habitat_id, $locataire_id);

	public function getReservationsByTenantId($locataire_id);

	public function getReservationsByHabitat($habitat_id);
}