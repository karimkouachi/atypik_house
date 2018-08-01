<?php

namespace App\Http\Repositories;

use App\Models\TypeTransaction;
use Carbon\Carbon;

class TypeTransactionRepository implements TypeTransactionRepositoryInterface
{

    protected $typeTransaction;

	public function __construct(TypeTransaction $typeTransaction)
	{
		$this->typeTransaction = $typeTransaction;
	}

    public function getTypeByLibelle($type){
        
        $type = 1;
        
        return $type;
    }
}