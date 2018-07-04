<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model 
{

    protected $table = 'activite';
    public $timestamps = false;

    public function attachToHabitat()
    {
        return $this->belongsToMany('Habitat');
    }

}