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

	public function getFieldByOneId($idChamp){
		$champ = $this->creationChamp->where('id', $idChamp)->first();

		return $champ;
	}

	public function getFieldsAllCategories($tabIdEnumsCategories)
	{	
		$tabChampsCategories = [];

		foreach ($tabIdEnumsCategories as $key => $categories) {
			foreach ($categories as $libelleCategorie => $tabIdChamps) {
				$champs = $this->creationChamp->whereIn('id', $tabIdChamps)->get();

				foreach ($champs as $key => $champ) {
					$type = TypeChamp::where('id', $champ->type_champ_id)->first();
					$libelleType = $type->libelle_type_champ;
					$champ->type_champ_id = $libelleType;

					if($champ->null_champ == 0){
						$champ->null_champ = "Oui";
					}else{
						$champ->null_champ = "Non";
					}
				}

				array_push($tabChampsCategories, array($libelleCategorie => $champs));				
			}
		}
		return $tabChampsCategories;
	}

	public function getFieldsNotAllCategories($tabIdEnumsCategories)
	{	
		$tabChampsDispo = [];

		foreach ($tabIdEnumsCategories as $key => $categories) {
			foreach ($categories as $libelleCategorie => $tabIdChamps) {
				if(count($tabIdChamps) > 0){
					$champsDispoByCategorie = $this->creationChamp->whereNotIn('id', $tabIdChamps)->get();
				}else{
					$champsDispoByCategorie = $this->creationChamp->get()->all();
				}

				if(count($champsDispoByCategorie) > 0){
					foreach ($champsDispoByCategorie as $key => $champ) {
						$type = TypeChamp::where('id', $champ->type_champ_id)->first();
						$libelleType = $type->libelle_type_champ;
						$champ->type_champ_id = $libelleType;

						if($champ->null_champ == 0){
							$champ->null_champ = "Oui";
						}else{
							$champ->null_champ = "Non";
						}
					}
					array_push($tabChampsDispo, array($libelleCategorie => $champsDispoByCategorie));
				}
			}
		}

		return $tabChampsDispo;
	}

	public function CreateField($label, $nom, $type, $longueur, $nullable, $placeholder)
	{	
		$champ = $this->creationChamp->where('libelle_champ', $nom)->get();

		if(count($champ)>0){
			$lastId = $champ[0]->id;

			return $lastId;
		}else{
			$this->creationChamp->label_champ = $label;
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

	public function getFieldByOneLibelleEnum($libelleEnum){
		$champ = $this->creationChamp->where('libelle_champ', $libelleEnum)->first();

		return $champ;
	}

	public function getFieldTextById($tabIdEnums){		

		$champsText = $this->creationChamp->whereIn('id', $tabIdEnums)->whereIn('type_champ_id', ['5', '7'])->get();

		return $champsText;
	}
}