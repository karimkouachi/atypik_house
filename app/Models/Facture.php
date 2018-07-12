<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model 
{

    protected $table = 'facture';
    public $timestamps = false;

    public function correspond()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function concerne()
    {
        return $this->belongsTo('Habitat');
    }

}