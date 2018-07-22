<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeChamp extends Model 
{

    protected $table = 'type_champ';
    public $timestamps = false;

    public function creationsChamp()
    {
        return $this->hasMany('CreationChamp');
    }
}