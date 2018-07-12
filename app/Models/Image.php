<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model 
{

    protected $table = 'image';
    public $timestamps = false;

    public function habitat()
    {
        return $this->belongsTo('Habitat');
    }

    public function membre()
    {
        return $this->belongsTo(\App\User::class);
    }

}