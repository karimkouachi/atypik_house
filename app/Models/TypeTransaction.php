<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTransaction extends Model 
{

    protected $table = 'type_transaction';
    public $timestamps = false;

    public function appartient_transaction()
    {
        return $this->hasMany('Transaction');
    }

}