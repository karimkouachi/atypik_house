<?php

namespace App\Http\Repositories;

use App\Models\Message;
use Carbon\Carbon;

class MessageRepository implements MessageRepositoryInterface
{    

	protected $message;

	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	public function sendMessage($contenu_message, $expediteur_id, $destinataire_id)
	{

		$date_message = Carbon::now('Europe/Paris');

        $this->message->contenu_message = $contenu_message;
        $this->message->date_message = $date_message;
        $this->message->expediteur_id = $expediteur_id;
        $this->message->destinataire_id = $destinataire_id;

        $this->message->save();
	}
}