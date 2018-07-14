<?php

namespace App\Http\Repositories;

use App\Models\Reservation;

class ReservationRepository
{

    protected $reservation;

	public function __construct(Reservation $reservation)
	{
		$this->reservation = $reservation;
	}

	public function getHabitat($id)
	{
        $reservations = Reservation::where('habitat_id', $id)->get();

        return $reservations;
	}

}