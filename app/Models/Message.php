<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model 
{

    protected $table = 'message';
    public $timestamps = false;

    public function expediteur()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function destinataire()
    {
        return $this->belongsTo(\App\User::class);
    }

}