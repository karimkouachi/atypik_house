<?php

namespace App\Http\Repositories;

use App\Models\Habitat;
use App\Models\Categorie;
use App\Models\ChampHabitat;
use App\Models\CreationChamp;
use App\Models\TypeChamp;
use Carbon\Carbon;
use DB;

class HabitatRepository implements HabitatRepositoryInterface
{

    protected $habitat;

	public function __construct(Habitat $habitat)
	{
		$this->habitat = $habitat;
	}

    public function getHabitatsById($idHabitats){
        return Habitat::where('id', $idHabitats)->where('actif_habitat', 1)->get();
    }

    public function getHabitatsRecherche($recherche){
        /*if(is_array($recherche)){
            return Habitat::where('categorie_id', $recherche)->get(); 
        }else{*/
            $phrase = explode(" ", $recherche);

            $categories = [];
            $list_habitats = [];

            foreach($phrase as $mot){
                $categorie = Categorie::where('libelle_categorie', $mot)->first();
                if(count((array)$categorie) > 0){

                    $habitats = Habitat::where('categorie_id', $categorie['id'])->get();
                    if(count($habitats) > 0){
                        foreach($habitats as $key => $habitat){
                            $exist = false;
                            foreach($list_habitats as $list_habitat){
                                if($habitat['id'] == $list_habitat['id']){
                                    $exist = true;
                                    break;
                                }
                            }
                            if(!$exist){
                                array_push($list_habitats, $habitat);
                            }
                        }
                        
                    } 
                }
            }

            foreach($phrase as $mot){
                if(strlen($mot) > 4){
                    $habitats = Habitat::where('nom_habitat', 'like', '%' . $mot . '%')->get(); 

                    if(count($habitats) > 0){
                        foreach($habitats as $key => $habitat){
                            $exist = false;
                            foreach($list_habitats as $list_habitat){
                                if($habitat['id'] == $list_habitat['id']){
                                    $exist = true;
                                    break;
                                }
                            }
                            if(!$exist){
                                array_push($list_habitats, $habitat);
                            }
                        }
                    }
                }
            }

            foreach($phrase as $mot){
                if(strlen($mot) > 4){
                    $champsHabitat = ChampHabitat::where('valeur_champ_habitat', 'like', '%' . $mot . '%')->get();

                    foreach ($champsHabitat as $key => $champHabitat) {
                        $creationChamp = CreationChamp::where('id', $champHabitat->champ_id)->first();
                        $type = TypeChamp::where('id', $creationChamp->type_champ_id)->first();

                        if($type->id == "5" || $type->id == "7"){
                            $habitat = $this->habitat->where('id', $champHabitat->habitat_id)->first();
                            $exist = false;
                            foreach($list_habitats as $list_habitat){
                                if($habitat['id'] == $list_habitat['id']){
                                    $exist = true;
                                    break;
                                }
                            } 
                            if(!$exist){
                                array_push($list_habitats, $habitat);
                            }                     
                        }

                    }

                    /*$habitats = Habitat::where('ville_habitat', 'like', '%' . $mot . '%')
                                    ->orWhere('nom_habitat', 'like', '%' . $mot . '%')
                                    ->orWhere('pays_habitat', 'like', '%' . $mot . '%')
                                    ->get(); */
                }
            }
            return $list_habitats;
        /*}*/
    }

    public function getAllHabitats(){
        $habitats = $this->habitat->where('actif_habitat', 1)->get();
        return $habitats;
    }

    public function getHabitat($id){
        $habitat = $this->habitat->findOrFail($id);
        return $habitat;
    }

    public function getHabitatsByCategorie($idsCategorie){
        $habitats = $this->habitat->whereIn('categorie_id', $idsCategorie)->get();

        return $habitats;
    }

    public function getHabitatsByOneCategorie($idCategorie){
        $habitats = $this->habitat->where('categorie_id', $idCategorie)->where('actif_habitat', 1)->get();

        return $habitats;
    }

    public function addField($habitats, $idNouveauChamp, $reservationRepository){
        /*if(!empty($longueur)){
            DB::statement("ALTER TABLE habitat ADD ".$nom." ".$type."(".$longueur.")");
        }else{
            DB::statement("ALTER TABLE habitat ADD ".$nom." ".$type);
        }*/

        foreach ($habitats as $habitat) {
            /*$champHabitatRepository->addFieldHabitat($habitat, $idNouveauChamp);*/

            $reservations = $reservationRepository->getHabitatReserve($habitat->id);

            if(count($reservations) > 0){
                $this->habitat->where('categorie_id', $_POST['categories'])->update(['dispo_habitat' => 0]);
            }else{
                $this->habitat->where('categorie_id', $_POST['categories'])->update(['actif_habitat' => 0]);   
            }   
        }

        return "envoi demande de re-saisie des nouveaux champs de l'habitat par son proprietaire";
    }

	public function save($nom_habitat, $prix_habitat, $num_habitat, $photo_habitat, $proprietaire_id, $categorie_id)
	{

        $date_create_habitat = Carbon::now('Europe/Paris');

        $this->habitat->nom_habitat = $nom_habitat;
        $this->habitat->prix_habitat = $prix_habitat;
        $this->habitat->num_habitat = $num_habitat;
        $this->habitat->photo_habitat = $photo_habitat;
        $this->habitat->date_create_habitat = $date_create_habitat;
        $this->habitat->proprietaire_id = $proprietaire_id;
        $this->habitat->categorie_id = $categorie_id;

        $this->habitat->save();
	}

    public function hideHabitat($idHabitat){
        $habitat = $this->habitat->where('id', $idHabitat)->update(['actif_habitat' => 0]);
        return $habitat;
    }

    public function checkHabitat($idHabitat){
        $habitat = $this->habitat->where('id', $idHabitat)->update(['actif_habitat' => 1, 'dispo_habitat' => 1, 'en_attente_habitat' => 0, 'date_valide_habitat' => Carbon::now('Europe/Paris')]);

        return $habitat;
    }

    public function getLastCreatedHabitat(){
        $habitat = $this->habitat->orderBy('id', 'desc')->first();

        return $habitat;
    }

}