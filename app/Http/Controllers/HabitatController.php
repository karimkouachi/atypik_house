<?php 

namespace App\Http\Controllers;

use App\Http\Repositories\CategorieRepository;
use App\Http\Repositories\HabitatRepository;
use App\Http\Repositories\MessageRepository;
use App\Http\Repositories\ReservationRepository;
use App\Http\Repositories\CreationChampRepository;
use App\Http\Repositories\TypeChampRepository;
use App\Http\Repositories\ChampHabitatRepository;
use App\Http\Requests\HabitatRequest;
use App\Http\Requests\MessageRequest;
use App\Models\Habitat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Schema;
use Response;
use DB;
use Session;
use Validator;


class HabitatController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
    if($_POST){
      $conditions = [];

      if(isset($_POST["categorie"])){
        $conditions["categorie_id"] = $_POST["categorie"];
      } 

      if(isset($_POST["ville_habitat"]) && $_POST["ville_habitat"] != ""){
        $ville = $_POST['ville_habitat'];
        $conditions["ville_habitat"] = $ville;  
      }

      $habitats = $habitatRepository->getHabitats($conditions);

    }elseif($_GET){
      $phrase = $_GET['phrase'];
      $habitats = $habitatRepository->getHabitats($phrase);

      return Response::json($habitats);

    }else{
      $habitats = $habitatRepository->getAllHabitats();
    }
    
    $categories = $categorieRepository->getLibelleCategories();

    return view("habitats")->with(array("habitats" => $habitats, "categories" => $categories));
  }

  /**
   * Get champs categorie.
   *
   * @return Response
   */
  public function get_champs_categorie(CategorieRepository $categorieRepository, CreationChampRepository $creationChampRepository, TypeChampRepository $typeChampRepository)
  {
    $idCategorie = $_GET['idCategorie'];

    //Recup valeurs enums pour id categorie
    $idEnums = $categorieRepository->getEnumsOneCategorie($idCategorie);

    if(count($idEnums)>0){
      $champs = $creationChampRepository->getFieldById($idEnums);

      foreach ($champs as $key => $champ) {
        $libelleType = $typeChampRepository->getLibelleTypeById($champ->type_champ_id);
        $champ->type_champ_id = $libelleType;
      }

    }else{
      $champs = "";
    }

    /*$sm = DB::getDoctrineSchemaManager();
    $bdds = $sm->listDatabases();
    $columns = $sm->listTableColumns('habitat');

    $champsTableHabitat = [];

    foreach ($columns as $column) {
      array_push($champsTableHabitat, array(
        'nom' => $column->getName()
        )
      );
    }*/

    /*$champs = $categorieRepository->getChampsCategorie($idCategorie);*/
    
    return Response::json($champs);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(CategorieRepository $categorieRepository)
  {
    $categories = $categorieRepository->getLibelleCategories();
    return view("create_habitat")->with("categories", $categories);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreationChampRepository $creationChampRepository, ChampHabitatRepository $champHabitatRepository, HabitatRequest $habitatRequest, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
    $idProprietaire = Auth::user()->id;
    
    //Valider les champs dynamiques
    /*$validated = $request->validate([
        
    ]);*/

    $validated = $habitatRequest->validated();

    $habitatRepository->save(
      $_POST["nom_habitat"],
      $_POST["prix_habitat"],
      $_POST["num_habitat"],
      $_POST["photo_habitat"],
      $idProprietaire,
      $_POST["categorie"]
    );

    $currentHabitat = $habitatRepository->getLastCreatedHabitat();

    $idCurrentHabitat = $currentHabitat->id;

    $idChamps = $categorieRepository->getEnumsOneCategorie($_POST["categorie"]);

    $champs = $creationChampRepository->getFieldById($idChamps);

    /*$idChamps = $creationChampRepository->getIdByLibelleEnums($libelleEnums);*/

    foreach ($champs as $key => $champ) {
      $valeurChamp = $_POST[$champ->libelle_champ.'_habitat'];
      $champHabitatRepository->addFieldOneHabitat($idCurrentHabitat, $idChamps, $valeurChamp);
    }

    Session::flash('message', 'Habitat crée avec succès!');

    return view('create_activite')->with('idCurrentHabitat', $idCurrentHabitat);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id, HabitatRepository $habitatRepository)
  {
    $habitat = $habitatRepository->getHabitat($id);

    return view('habitat')->with('habitat', $habitat);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
    $habitat = $habitatRepository->getHabitat($id);
    $categories = $categorieRepository->getLibelleCategories();

    return view("edit_habitat")->with(array("habitat" => $habitat, "categories" => $categories));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, HabitatRequest $habitatRequest, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
    $validated = $habitatRequest->validated();

    $habitat = $habitatRepository->getHabitat($id);
    /*$idCategrorie = $categorieRepository->getIdCategorie($_POST["categorie"]);*/

    $habitat->nom_habitat = $_POST["nom_habitat"];
    $habitat->capacite_habitat = $_POST["capacite_habitat"];
    $habitat->prix_habitat = $_POST["prix_habitat"];
    $habitat->adresse_habitat = $_POST["adresse_habitat"];
    $habitat->cp_habitat = $_POST["cp_habitat"];
    $habitat->ville_habitat = $_POST["ville_habitat"];
    $habitat->pays_habitat = $_POST["pays_habitat"];
    $habitat->num_habitat = $_POST["num_habitat"];
    $habitat->photo_habitat = $_POST["photo_habitat"];
    $habitat->actif_habitat = false/*$HabitatRequest->input('actif_habitat')*/;
    $habitat->dispo_habitat = true/*$HabitatRequest->input('dispo_habitat')*/;
    $habitat->en_attente_habitat = true/*$HabitatRequest->input('en_attente_habitat')*/;
    $habitat->date_create_habitat = new \DateTime()/*$HabitatRequest->input('date_create_habitat')*/;
    $habitat->date_valide_habitat = new \DateTime()/*$HabitatRequest->input('date_valide_habitat')*/;
    $habitat->proprietaire_id = 1/*$IdProprietaire*//*$HabitatRequest->input('proprietaire_id')*/;
    $habitat->categorie_id = $_POST["categorie"];

    $habitat->save();

    Session::flash('message', 'Habitat modifier avec succès!');    

    return Redirect::to("habitat/".$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function delete($id, HabitatRepository $habitatRepository)
  {
    $habitat = $habitatRepository->hideHabitat($id);

    
    Session::flash('message', "Habitat masqué avec succès!");
    return Redirect::to('habitats');
  }

  /**
   * Edit habitats gerant.
   *
   * @param
   * @return Response
   */
  public function edit_habitats_gerant(CategorieRepository $categorieRepository, TypeChampRepository $typeChampRepository)
  {
    $categories = $categorieRepository->getLibelleCategories();

    $types = $typeChampRepository->getTypes();

    /*$colonnes = Schema::getColumnListing("habitat");*/

    /*$sm = DB::getDoctrineSchemaManager();
    $bdds = $sm->listDatabases();
    $columns = $sm->listTableColumns('habitat');

    $colonnesTable = [];

    foreach ($columns as $column) {
      array_push($colonnesTable, array(
        'nom' => $column->getName(),
        'type' => $column->getType()->getName()
        )
      );
    }*/

    return view("edit_habitats_gerant")->with(array("categories" => $categories, "types" => $types));
  }

  public function get_enums_categorie(CategorieRepository $categorieRepository, CreationChampRepository $creationChampRepository){

    $idsCategorie = $_GET['idsCategorie'];

    $idEnums = $categorieRepository->getEnumsAllCategories($idsCategorie);

    $tabChampsCategories = $creationChampRepository->getFieldsAllCategories($idEnums);

    return Response::json( $tabChampsCategories );
  }

  public function delete_enum(HabitatRepository $habitatRepository, CategorieRepository $categorieRepository, CreationChampRepository $creationChampRepository, ChampHabitatRepository $champHabitatRepository){

    $categorie = $_GET['categorie'];
    $libelleChamp = $_GET['libelleChamp'];

    $idCategorie = $categorieRepository->getIdCategorie($categorie);

    $enums = $categorieRepository->deleteEnum($categorie, $libelleChamp);

    $champ = $creationChampRepository->getField($libelleChamp);
    $idChamp = $champ[0]->id;

    $habitats = $habitatRepository->getHabitatsByOneCategorie($idCategorie);

    $idHabitats = [];

    foreach ($habitats as $key => $habitat) {
      array_push($idHabitats, $habitat->id);
    }

    /*$idHabitats = $champHabitatRepository->getIdHabitatsByIdChamp($idChamp);*/

    $nbChampHabitat = $champHabitatRepository->deleteField($idHabitats, $idChamp);

    if(count($nbChampHabitat) == 0){
      $creationChampRepository->deleteField($libelleChamp);
    }

    $message = 'Champ supprimé avec succès!';  

    return Response::json( $message );
  }  

  /**
   * Update habitats gerant.
   *
   * @param
   * @return Response
   */
  public function update_habitats_gerant(Request $request, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository,
    ReservationRepository $reservationRepository, CreationChampRepository $creationChampRepository, ChampHabitatRepository $champHabitatRepository)
  {
    $idsCategorie = $_POST['categories'];
    $nom = $_POST['nom'];
    $type = $_POST['type'];    
    $nullable = $_POST['nullable'];
    $placeholder = $_POST['placeholder'];

    if($type == "7" || $type == "4"){
      $validated = $request->validate([
        'nom' => 'required',
        'longueur' => 'required',
        'placeholder' => 'required'
      ]);
    }else{
      $validated = $request->validate([
        'nom' => 'required',
        'placeholder' => 'required'
      ]);
    }

    if($_POST['longueur'] == ""){
      $longueur = null;
    }else{
      $longueur = $_POST['longueur'];  
    }

    $idNouveauChamp = $creationChampRepository->createField($nom, $type, $longueur, $nullable, $placeholder);

    $habitats = $habitatRepository->getHabitatsByCategorie($idsCategorie);

    $champHabitatRepository->addFieldHabitat($habitats, $idNouveauChamp);

    $habitatRepository->addField($habitats, $idNouveauChamp, $reservationRepository);

    $categorieRepository->addEnum($idsCategorie, $idNouveauChamp);

    Session::flash('message', 'Habitats modifier avec succès!');    

    return Redirect::to("habitats/edit");
  }

  public function send_message($id, HabitatRepository $habitatRepository, MessageRepository $messageRepository, MessageRequest $messageRequest)
  {
    $habitat = $habitatRepository->getHabitat($id);
    $idDestinaire = $habitat->proprietaire->id;
    $idExpe = Auth::user()->id;

    $validated = $messageRequest->validated();
    
    $messageRepository->sendMessage(
      $_POST["contenu_message"],
      $idExpe,
      $idDestinaire
    );

    return Redirect::to('habitat/'.$id);
  }

  public function checkHabitat($id, HabitatRepository $habitatRepository){

    $habitat = $habitatRepository->checkHabitat($id);

    Session::flash('message', "Cet habitat a été validé avec succès!");
    return Redirect::to('habitat/'.$id);
  }

  public function seeReservations($id, ReservationRepository $reservationRepository){
    $reservationsParHabitat = $reservationRepository->getReservationsByHabitat($id);

    /*return view('reservations_by_habitat')->with('reservations', $reservationsParHabitat);*/

    return view('reservations')->with('reservations', $reservationsParHabitat);
  }
  
}

?>