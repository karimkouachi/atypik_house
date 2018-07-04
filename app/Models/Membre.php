<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model 
{

    protected $table = 'membre';
    public $timestamps = false;

    public function envoie_message()
    {
        return $this->hasMany('Message');
    }

    public function recoit_message()
    {
        return $this->hasMany('Message');
    }

    public function facture()
    {
        return $this->hasMany('Facture');
    }

    public function effectue_transaction()
    {
        return $this->hasMany('Transaction');
    }

    public function recoit_transaction()
    {
        return $this->hasMany('Transaction');
    }

    public function possede_habitat()
    {
        return $this->hasMany('Habitat');
    }

    public function realise_reservation()
    {
        return $this->hasMany('Reservation');
    }

    public function photos()
    {
        return $this->hasMany('Image');
    }

}