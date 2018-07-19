<?php

namespace App\Http\Repositories;

interface ActiviteRepositoryInterface
{
    public function save($libelle_activite, $adresse_activite, $cp_activite, $ville_activite, $pays_activite, $descriptif_activite);

    public function getLastCreatedActivite();	
}