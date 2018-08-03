<?php

namespace App\Http\Transformers;

use App\Models\Habitat;
use League\Fractal\TransformerAbstract;

class HabitatTransformer extends TransformerAbstract
{
    public function transform(Habitat $habitat) : array
    {
        return [
          'nom' => $habitat->nom_habitat,
          'prix' => $habitat->prix_habitat,
          'num' => $habitat->num_habitat,
          'photo' => $habitat->photo_habitat,
          'actif' => $habitat->actif_habitat,
          'dispo' => $habitat->dispo_habitat,
          'en_attente' => $habitat->en_attente_habitat,
          'date_creation' => $habitat->date_create_habitat,
          'date_valide' => $habitat->date_valide_habitat,
          'proprietaire' => $habitat->proprietaire_id,
          'categorie' => $habitat->categorie_id
        ];
    }
}