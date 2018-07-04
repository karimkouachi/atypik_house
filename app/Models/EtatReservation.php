<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtatReservation extends Model 
{

    protected $table = 'etat_reservation';
    public $timestamps = false;

    public function reservation()
    {
        return $this->hasMany('Reservation');
    }

}