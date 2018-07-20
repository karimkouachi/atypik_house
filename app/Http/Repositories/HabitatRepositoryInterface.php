<?php

namespace App\Http\Repositories;

interface HabitatRepositoryInterface
{

	public function getHabitats($recherche);

	public function getAllHabitats();

	public function getHabitat($id);

    public function save($nom_habitat, $nombre_habitat, $prix_habitat, $adresse_habitat, $cp_habitat, $ville_habitat, $pays_habitat, $num_habitat, $photo_habitat, $proprietaire_id, $categorie_id);

    public function hideHabitat($idHabitat);

    public function checkHabitat($idHabitat);
}