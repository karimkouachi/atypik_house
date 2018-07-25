<?php

namespace App\Http\Repositories;

use App\Models\CreationChamp;
use App\Models\TypeChamp;

class CreationChampRepository implements CreationChampRepositoryInterface
{    

	protected $creationChamp;

	public function __construct(CreationChamp $creationChamp)
	{
		$this->creationChamp = $creationChamp;
	}

	public function getField($libelleEnums)
	{	
		/*foreach ($libelleEnums as $key => $libelle) {*/
			$champs = $this->creationChamp->where('libelle_champ', $libelleEnums)->get();

			return $champs;
		/*}*/
	}

	public function getFieldById($idEnums){
		$champs = $this->creationChamp->whereIn('id', $idEnums)->get();

		return $champs;
	}

	public function getFieldsAllCategories($tabIdEnumsCategories)
	{	
		$tabChampsCategories = [];

		foreach ($tabIdEnumsCategories as $key => $categories) {
			foreach ($categories as $keyIdChamps => $idChamps) {
				$champs = $this->creationChamp->whereIn('id', $idChamps)->get();

				foreach ($champs as $key => $champ) {
					$type = TypeChamp::where('id', $champ->type_champ_id)->first();
					$libelleType = $type->libelle_type_champ;
					$champ->type_champ_id = $libelleType;
				}

				array_push($tabChampsCategories, array($keyIdChamps => $champs));				
			}
		}
		return $tabChampsCategories;
	}

	public function getFieldsNotAllCategories($tabIdEnumsNotCategories)
	{	
		$tabChampsDispo = [];

		foreach ($tabIdEnumsNotCategories as $key => $idChamps) {
			
				$champs = $this->creationChamp->whereNotIn('id', $idChamps)->get();

				foreach ($champs as $key => $champ) {
					$type = TypeChamp::where('id', $champ->type_champ_id)->first();
					$libelleType = $type->libelle_type_champ;
					$champ->type_champ_id = $libelleType;
				}

				array_push($tabChampsDispo, $champs);				
			
		}
		return $tabChampsDispo;
	}

	public function CreateField($nom, $type, $longueur, $nullable, $placeholder)
	{	
		$champ = $this->creationChamp->where('libelle_champ', $nom)->get();

		if(count($champ)>0){
			$lastId = $champ[0]->id;

			return $lastId;
		}else{
			$this->creationChamp->libelle_champ = $nom;
			$this->creationChamp->type_champ_id = $type;
			$this->creationChamp->longueur_champ = $longueur;
			$this->creationChamp->null_champ = $nullable;
			$this->creationChamp->placeholder_champ = $placeholder;

			$this->creationChamp->save();

			return $this->creationChamp->id;
		}

	}

	public function deleteField($libelleChamp){
		$this->creationChamp->where('libelle_champ', $libelleChamp)->delete();
	}

	public function getIdByLibelleEnums($libelleEnums){
		$idChamps = $this->creationChamp->where('libelle_champ', $libelleEnums)->get();

		return $idChamps;
	}
}