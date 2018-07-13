<?php

namespace App\Http\Repositories;

use App\Models\Activite;
use Carbon\Carbon;

class ActiviteRepository implements ActiviteRepositoryInterface
{

    protected $activite;

	public function __construct(Activite $activite)
	{
		$this->activite = $activite;
	}

    public function save($libelle_activite, $adresse_activite, $cp_activite, $ville_activite, $pays_activite, $descriptif_activite){

        $this->activite->libelle_activite = $libelle_activite;
        $this->activite->adresse_activite = $adresse_activite;
        $this->activite->cp_activite = $cp_activite;
        $this->activite->ville_activite = $ville_activite;
        $this->activite->pays_activite = $pays_activite;
        $this->activite->descriptif_activite = $descriptif_activite;

        $this->activite->save();
    }

}