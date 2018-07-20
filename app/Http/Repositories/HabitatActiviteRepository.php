<?php

namespace App\Http\Repositories;

use App\Models\HabitatActivite;
use Carbon\Carbon;

class HabitatActiviteRepository implements HabitatActiviteRepositoryInterface
{

    protected $habitat_activite;

	public function __construct(HabitatActivite $habitat_activite)
	{
		$this->habitat_activite = $habitat_activite;
	}

    public function save($idHabitat, $idActivite){

        $this->habitat_activite->habitat_id = $idHabitat;
        $this->habitat_activite->activite_id = $idActivite;

        $this->habitat_activite->save();
    }
}