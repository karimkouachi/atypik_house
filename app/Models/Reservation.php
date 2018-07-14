<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model 
{

    protected $table = 'reservation';
    public $timestamps = false;

    public function locataire()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function bookingStatut()
    {
        return $this->belongsTo('EtatReservation');
    }

    public function habitat()
    {
        return $this->belongsTo('Habitat');
    }

    public function gotTransactions()
    {
        return $this->hasMany('Transaction');
    }

}