<?php

namespace App\Http\Repositories;

interface HabitatRepositoryInterface
{

	public function getHabitatsRecherche($recherche);

	public function getAllHabitats();

	public function getHabitat($id);

	public function getHabitatsByCategorie($idsCategorie);

    public function save($nom_habitat, $prix_habitat, $num_habitat, $photo_habitat, $proprietaire_id, $categorie_id);

    public function hideHabitat($idHabitat);

    public function checkHabitat($idHabitat);
}