<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model 
{

    protected $table = 'transaction';
    public $timestamps = false;

    public function membre()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function beneficiaire()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function type_transaction()
    {
        return $this->belongsTo('TypeTransaction');
    }

    public function transactionReservation()
    {
        return $this->belongsTo('Reservation');
    }

}