<?php

namespace App\Http\Transformers;

use App\Models\Reservation;
use League\Fractal\TransformerAbstract;

class ReservationTransformer extends TransformerAbstract
{
    public function transform(Reservation $reservation) : array
    {
        return [
          'date_debut' => $reservation->date_debut_reservation,
          'date_fin' => $reservation->date_fin_reservation,
          'participants' => $reservation->participants_reservation,
          'commentaire' => $reservation->commentaire_reservation,
          'habitat' => $reservation->habitat_id,
          'locataire' => $reservation->locataire_id,
          'etat_reservation' => $reservation->etat_reservation_id
        ];
    }
}