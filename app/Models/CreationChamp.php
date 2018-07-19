<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreationChamp extends Model 
{

    protected $table = 'creation_champ';
    public $timestamps = false;

    public function typeChamp(){
    	return $this->belongsTo('TypeChamp');
    }

    public function ChampsHabitat(){
    	return $this->hasMany('ChampHabitat');
    }
}