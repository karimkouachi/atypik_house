<?php

namespace App\Http\Repositories;

interface ReservationRepositoryInterface
{
	public function makeReservation($date_debut_reservation, $date_fin_reservation, $participants_reservation, $habitat_id, $locataire_id);

	public function getReservationsByTenantId($locataire_id);

	public function getReservationsByHabitat($habitat_id);

	public function getHabitatReserve($id);

	public function getReservationById($id);

	public function commentStay($idReservation, $commentaire_reservation);

	public function deleteComment($idReservation);
}