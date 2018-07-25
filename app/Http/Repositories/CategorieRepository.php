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

	/*public function getChampsCategorie($idCategorie){
		
		

		return $champs;
	}*/

	public function getLibelleCategories(){
		$categories = $this->categorie->pluck('libelle_categorie', 'id')->toArray();
		
		asort($categories);

		return $categories;
	}

	public function getIdCategorie($libelle)
	{
        $categorie = Categorie::where('libelle_categorie', $libelle)->first();
        $idCategorie = $categorie->id;

        return $idCategorie;
	}

	public function getEnumsOneCategorie($idCategorie)
	{
        $categorie = Categorie::where('id', $idCategorie)->first();
        $enums = $categorie->enum_categorie;
        $enums = explode(";", $enums);
        array_pop($enums);

        return $enums;
	}

	public function getEnumsAllCategories($idsCategorie)
	{
        $categories = $this->categorie->whereIn('id', $idsCategorie)->get();

        $tabEnumsCategories = [];

        foreach ($categories as $categorie) {
        	$enums = $categorie->enum_categorie;
        	$enums = explode(";", $enums);
        	array_pop($enums);
      		array_push($tabEnumsCategories, array($categorie->libelle_categorie => $enums));
        }

        return $tabEnumsCategories;
	}	

	public function getEnumsNotAllCategories($idsCategorie)
	{
        $categories = $this->categorie->whereIn('id', $idsCategorie)->get();

        $tabEnums = [];

        foreach ($categories as $categorie) {
        	$enums = $categorie->enum_categorie;
        	$enums = explode(";", $enums);
        	array_pop($enums);
      		array_push($tabEnums, $enums);
        }

        return $tabEnums;
	}	

	public function addEnum($idsCategorie, $idNouveauChamp)
	{        
        $categories = $this->categorie->whereIn('id', $idsCategorie)->get();
        foreach ($categories as $categorie) {
        	$enums = $categorie->enum_categorie;

        	$tabEnums = explode(";", $enums);
        	if(!in_array($idNouveauChamp, $tabEnums)){
        		$this->categorie->where('id', $categorie->id)->update(['enum_categorie' => $idNouveauChamp.";".$enums]);
        	}
        }

        return $categories;
	}	

	public function deleteEnum($categorie, $idLibelleChamp)
	{
        $categorie = Categorie::where('libelle_categorie', $categorie)->first();

        $enums = $categorie->enum_categorie;

        $enums = str_replace($idLibelleChamp.";", "", $enums);

   		$this->categorie->where('id', $categorie->id)->update(['enum_categorie' => $enums]);

        return $enums;
	}
}