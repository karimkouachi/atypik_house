<?php

namespace App\Http\Repositories;

interface MessageRepositoryInterface
{
	public function sendMessage($contenu_message, $expediteur_id, $destinataire_id);
}