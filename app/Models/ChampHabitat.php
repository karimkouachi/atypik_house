<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChampHabitat extends Model 
{

    protected $table = 'champ_habitat';
    public $timestamps = false;

    public function habitat(){
    	return $this->belongsTo('Habitat');
    }

    public function creationChamp(){
    	return $this->belongsTo('CreationChamp');
    }

}