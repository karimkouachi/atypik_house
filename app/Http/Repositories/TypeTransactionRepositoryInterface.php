<?php

namespace App\Http\Repositories;

interface TypeTransactionRepositoryInterface
{
    public function getTypeByLibelle($type);	
}