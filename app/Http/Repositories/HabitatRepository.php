<?php

namespace App\Http\Repositories;

use App\Models\Habitat;
use App\Models\Categorie;
use Carbon\Carbon;
use DB;

class HabitatRepository implements HabitatRepositoryInterface
{

    protected $habitat;

	public function __construct(Habitat $habitat)
	{
		$this->habitat = $habitat;
	}

    public function getHabitats($recherche){
        if(is_array($recherche)){
            return $habitats = Habitat::where($recherche)->get();   
        }else{
            $phrase = explode(" ", $recherche);

            $categories = [];
            $list_habitats = [];

            foreach($phrase as $mot){
                $categorie = Categorie::where('libelle_categorie', $mot)->get();
                if(count($categorie) > 0){

                    $habitats = Habitat::where('categorie_id', $categorie[0]['id'])->get();
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

                if(strlen($mot) > 4){
                    $habitats = Habitat::where('ville_habitat', 'like', '%' . $mot . '%')
                                    ->orWhere('nom_habitat', 'like', '%' . $mot . '%')
                                    ->orWhere('pays_habitat', 'like', '%' . $mot . '%')
                                    ->get(); 

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
            return $list_habitats;
        }
    }

    public function getAllHabitats(){
        $habitats = $this->habitat->where('actif_habitat', 1)->get();
        return $habitats;
    }

    public function getHabitat($id){
        $habitat = $this->habitat->findOrFail($id);
        return $habitat;
    }


    public function addField($idCategorie, $nom, $type, $longueur, $reservationRepository){
        /*$alterTableFile = fopen(app_path()."/../database/migrations/2018_07_12_230245_add_field_to_habitat.php", "r+");
*/
        /*while (!feof($alterTableFile))
        {
            if (($ligne = fgets($alterTableFile)) !== false)
            {
                echo $ligne;*/
                /*'Schema::table("habitat", function (Blueprint $table) {'
                fwrite($alterTableFile, "table->string(name, 100);");*/
            /*}
       }die;*/

        /*while ( ($ligne = fgets($alterTableFile) ) !== "Schema::table('habitat', function (Blueprint") {
            
            fputs($alterTableFile, "table->string(name, 100);");
        }   */     

        /*fclose($alterTableFile);*/

        if(!empty($longueur)){
            DB::statement("ALTER TABLE habitat ADD ".$nom." ".$type."(".$longueur.")");
        }else{
            DB::statement("ALTER TABLE habitat ADD ".$nom." ".$type);
        }

        $habitats = Habitat::where('categorie_id', $idCategorie)->get();

        foreach ($habitats as $key => $habitat) {

            $reservations = $reservationRepository->getHabitat($habitat->id);

            if(count($reservations) > 0){
                $this->habitat->where('categorie_id', $_POST['categorie'])->update(['dispo_habitat' => 0]);
            }else{
                $this->habitat->where('categorie_id', $_POST['categorie'])->update(['actif_habitat' => 0]);   
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