<?php

namespace App\Http\Repositories;

use App\Models\Categorie;

class CategorieRepository implements CategorieRepositoryInterface
{

    protected $categorie;

	public function __construct(Categorie $categorie)
	{
		$this->categorie = $categorie;
	}

	public function getIdCategorie($libelleCategorie)
	{
        $categrorie = Categorie::where('libelle_categorie', $libelleCategorie)->first();
        $idCategorie = $categrorie->id_categorie;

        return $idCategorie;
	}

}