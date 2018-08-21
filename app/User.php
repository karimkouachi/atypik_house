<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','pseudo_membre', 'nom_membre', 'prenom_membre', 'naissance_membre', 'adresse_membre', 'cp_membre', 'ville_membre', 'pays_membre', 'actif_membre', 'photo_membre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
