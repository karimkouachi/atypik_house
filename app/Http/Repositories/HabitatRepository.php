<?php

namespace App\Http\Repositories;

use App\Models\Habitat;

class HabitatRepository implements HabitatRepositoryInterface
{

    protected $habitat;

	public function __construct(Habitat $habitat)
	{
		$this->habitat = $habitat;
	}

    public function getRechercheHabitats($conditions){
        $habitats = Habitat::where($conditions)->get();
        return $habitats;
    }

    public function getAllHabitats(){
        $habitats = $this->habitat->all();
        return $habitats;
    }

    public function getHabitat($id){
        $habitat = $this->habitat->findOrFail($id);
        return $habitat;
    }

	public function save($nom_habitat, $capacite_habitat, $prix_habitat, $adresse_habitat, $cp_habitat, $ville_habitat, $pays_habitat, $num_habitat, $photo_habitat, $actif_habitat, $dispo_habitat, $en_attente_habitat, $date_create_habitat, $date_valide_habitat, $proprietaire_id, $categorie_id)
	{
        $this->habitat->nom_habitat = $nom_habitat;
        $this->habitat->capacite_habitat = $capacite_habitat;
        $this->habitat->prix_habitat = $prix_habitat;
        $this->habitat->adresse_habitat = $adresse_habitat;
        $this->habitat->cp_habitat = $cp_habitat;
        $this->habitat->ville_habitat = $ville_habitat;
        $this->habitat->pays_habitat = $pays_habitat;
        $this->habitat->num_habitat = $num_habitat;
        $this->habitat->photo_habitat = $photo_habitat;
        $this->habitat->actif_habitat = $actif_habitat;
        $this->habitat->dispo_habitat = $dispo_habitat;
        $this->habitat->en_attente_habitat = $en_attente_habitat;
        $this->habitat->date_create_habitat = $date_create_habitat;
        $this->habitat->date_valide_habitat = $date_valide_habitat;
        $this->habitat->proprietaire_id = $proprietaire_id;
        $this->habitat->categorie_id = $categorie_id;

        $this->habitat->save();
	}

}