<?php

namespace App\Http\Repositories;

interface CategorieRepositoryInterface
{

	public function getLibelleCategories();
    public function getIdCategorie($libelle);
}