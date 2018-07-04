<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model 
{

    protected $table = 'reservation';
    public $timestamps = false;

    public function locataire()
    {
        return $this->belongsTo('Membre');
    }

    public function bookingStatut()
    {
        return $this->belongsTo('EtatReservation');
    }

    public function gotTransactions()
    {
        return $this->hasMany('Transaction');
    }

}