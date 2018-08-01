<?php

namespace App\Http\Repositories;

interface TransactionRepositoryInterface
{
    public function save($montant, $date, $tx, $idLocataire, $idType, $idReservation);
}