<?php

namespace App\Http\Repositories;

interface ChampHabitatRepositoryInterface
{
	public function addFieldHabitat($habitats, $idNouveauChamp);

	/*public function getIdHabitatsByIdChamp($idChamp);*/

	public function deleteField($idHabitats, $idChamp);
}