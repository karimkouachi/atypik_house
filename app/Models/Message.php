<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model 
{

    protected $table = 'message';
    public $timestamps = false;

    public function expediteur()
    {
        return $this->belongsTo('Membre');
    }

    public function destinataire()
    {
        return $this->belongsTo('Membre');
    }

}