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

	/*public function getAllCategories(){
		$categories = $this->categorie->all();

		return $categories;
	}*/

	public function getLibelleCategories(){
		$categories = $this->categorie->pluck('libelle_categorie', 'id');
		return $categories;
	}

	public function getIdCategorie($idCategorie)
	{
        $categrorie = Categorie::where('id', $idCategorie)->first();
        $idCategorie = $categrorie->id;

        return $idCategorie;
	}

}