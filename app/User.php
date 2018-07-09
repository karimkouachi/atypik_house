<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mail_membre', 'password','pseudo_membre', 'nom_membre', 'prenom_membre', 'naissance_membre', 'adresse_membre', 'cp_membre', 'ville_membre', 'pays_membre', 'actif_membre', 'photo_membre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
