<?php

namespace App\Http\Repositories;

use App\Models\ChampHabitat;

class ChampHabitatRepository implements ChampHabitatRepositoryInterface
{

    protected $champHabitat;

	public function __construct(ChampHabitat $champHabitat)
	{
		$this->champHabitat = $champHabitat;
	}

    public function addFieldHabitat($habitats, $idNouveauChamp)
    {
        foreach ($habitats as $key => $habitat) {
            $champs = $this->champHabitat->where('habitat_id', $habitat->id)->where('champ_id', $idNouveauChamp)->get();

            if(count($champs)==0){
                $champHabitat = new ChampHabitat;

                $champHabitat->habitat_id = $habitat->id;
                $champHabitat->champ_id = $idNouveauChamp;
        /*            $champHabitat->valeur_champ_habitat = null;*/

                $champHabitat->save();           
            }
        }

       return $idNouveauChamp;
    }

    public function addFieldOneHabitat($idHabitat, $idChamps, $valeurChamp){
        foreach ($idChamps as $key => $idChamp) {
            $champHabitat = new ChampHabitat;

            $champHabitat->habitat_id = $idHabitat;
            $champHabitat->champ_id = $idChamp;
            $champHabitat->valeur_champ_habitat = $valeurChamp;

            $champHabitat->save();   
        }
    }

    /*public function getIdHabitatsByIdChamp($idChamp){
        $idHabitats = $this->champHabitat->where('champ_id', $idChamp)->pluck('habitat_id')->toArray();

        return $idHabitats;
    }*/

    public function deleteField($idHabitats, $idChamp){
        $this->champHabitat->whereIn('habitat_id', $idHabitats)->where('champ_id', $idChamp)->delete();

        $nbChampHabitat = $this->champHabitat->where('champ_id', $idChamp)->get();

        return $nbChampHabitat;
    }
}