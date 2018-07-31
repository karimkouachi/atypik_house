<?php

namespace App\Http\Repositories;

use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{

    protected $transaction;

	public function __construct(Transaction $transaction)
	{
		$this->transaction = $transaction;
	}

    public function create($montant, $date, $tx, $idLocataire, $idType, $proprietaire, $idReservation){
        $this->transaction->montant_transaction = $montant;
        $this->transaction->date_transaction = $date;
        $this->transaction->tx_remboursement_transaction = $tx;
        $this->transaction->locataire_id = $idLocataire;
        $this->transaction->type_id = $idType;
        $this->transaction->reservation_id = $idReservation;

        $this->transaction->save();
    }
}