<?php

namespace App\Http\Repositories;

use App\Models\TypeChamp;

class TypeChampRepository implements TypeChampRepositoryInterface
{

    protected $typeChamp;

	public function __construct(TypeChamp $typeChamp)
	{
		$this->typeChamp = $typeChamp;
	}

    public function getTypes()
    {    
        $types = $this->typeChamp->pluck('libelle_type_champ', 'id')->toArray();

        return $types;
    }

    public function getLibelleTypeById($idType){
        $type = $this->typeChamp->where('id', $idType)->first();
        $libelleType = $type->libelle_type_champ;

        return $libelleType;
    }
}