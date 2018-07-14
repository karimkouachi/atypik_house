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
		$categories = $this->categorie->pluck('libelle_categorie', 'id')->toArray();
		
		asort($categories);

		return $categories;
	}

	public function getIdCategorie($idCategorie)
	{
        $categorie = Categorie::where('id', $idCategorie)->first();
        $idCategorie = $categorie->id;

        return $idCategorie;
	}

	public function getEnums($idCategorie)
	{
        $categorie = Categorie::where('id', $idCategorie)->first();
        $enums = $categorie->enum_categorie;

        return $enums;
	}

	public function deleteEnum($idCategorie, $champ)
	{
        $categorie = Categorie::where('id', $idCategorie)->first();
        $enums = $this->getEnums($idCategorie);

        return $enums;
	}
}