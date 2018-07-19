<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model 
{

    protected $table = 'habitat';
    public $timestamps = false;

    public function proprietaire()
    {
        return $this->belongsTo(\App\User::class, 'proprietaire_id');
    }

    public function categorie()
    {
        return $this->belongsTo('Categorie');
    }

    public function facture()
    {
        return $this->hasMany('Facture');
    }

    public function photos()
    {
        return $this->hasMany('Image');
    }

    public function haveActivity()
    {
        return $this->belongsToMany('Activite');
    }

    public function reservations(){
        return $this->hasMany('Reservation');
    }

    public function champsHabitat(){
        return $this->hasMany('ChampHabitat');
    }

}