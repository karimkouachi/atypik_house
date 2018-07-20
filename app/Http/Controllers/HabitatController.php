<?php 

namespace App\Http\Controllers;

use App\Http\Repositories\CategorieRepository;
use App\Http\Repositories\HabitatRepository;
use App\Http\Repositories\MessageRepository;
use App\Http\Repositories\ReservationRepository;
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
  public function get_champs_categorie(CategorieRepository $categorieRepository)
  {
    $idCategorie = $_GET['idCategorie'];

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
    
    return Response::json("champsTableHabitat");
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
  public function store(HabitatRequest $habitatRequest, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
      $validated = $habitatRequest->validated();
      $idProprietaire = Auth::user()->id;
    
      $habitatRepository->save(
        $_POST["nom_habitat"],
        $_POST["capacite_habitat"],
        $_POST["prix_habitat"],
        $_POST["adresse_habitat"],
        $_POST["cp_habitat"],
        $_POST["ville_habitat"],
        $_POST["pays_habitat"],
        $_POST["num_habitat"],
        $_POST["photo_habitat"],
        $idProprietaire,
        $_POST["categorie"]
      );

    Session::flash('message', 'Habitat crée avec succès!');

    return Redirect::to('activite/create');
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
  public function edit_habitats_gerant(CategorieRepository $categorieRepository)
  {
    $categories = $categorieRepository->getLibelleCategories();
    /*$colonnes = Schema::getColumnListing("habitat");*/

    $sm = DB::getDoctrineSchemaManager();
    $bdds = $sm->listDatabases();
    $columns = $sm->listTableColumns('habitat');

    $colonnesTable = [];

    foreach ($columns as $column) {
      array_push($colonnesTable, array(
        'nom' => $column->getName(),
        'type' => $column->getType()->getName()
        )
      );
    }

    return view("edit_habitats_gerant")->with(array("categories" => $categories, "colonnesTable" => $colonnesTable));
  }

  public function get_enums_categorie(CategorieRepository $categorieRepository){

    $idCategorie = $_GET['idCategorie'];

    /*$enums = $categorieRepository->getEnums($idCategorie);*/
    /*$enums = Schema::getColumnListing("habitat");*/
    /*$enums = DB::connection()->getDoctrineColumn('habitat', 'nom_habitat')->getType();*/
    /*$enums = ['superficie'];*/

    $sm = DB::getDoctrineSchemaManager();
    $bdds = $sm->listDatabases();
    $columns = $sm->listTableColumns('habitat');

    $colonnesTable = [];

    foreach ($columns as $column) {
      array_push($colonnesTable, array(
        'nom' => $column->getName(),
        'type' => $column->getType()->getName()
        )
      );
    }

    return Response::json( $colonnesTable );
  }

  public function delete_enum(CategorieRepository $categorieRepository){

    $idCategorie = $_GET['idCategorie'];
    $champ = $_GET['champ'];

    /*$enums = $categorieRepository->deleteEnum($idCategorie, $champ);*/
    /*$enums = Schema::getColumnListing("habitat");*/
    $enums = ['superficie supprimé'];

    Session::flash('message', 'Champ supprimé avec succès!');  

    return Response::json( $enums );
  }  

  /**
   * Update habitats gerant.
   *
   * @param
   * @return Response
   */
  public function update_habitats_gerant(Request $request, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository, ReservationRepository $reservationRepository)
  {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $longueur = $_POST['longueur'];

    if($type == "varchar"){
      $validated = $request->validate([
        'nom' => 'required',
        'longueur' => 'required'
      ]);
    }else{
      $validated = $request->validate([
        'nom' => 'required'
      ]);
    }

    $idCategrorie = $categorieRepository->getIdCategorie($_POST['categorie']);
    $habitat = $habitatRepository->addField($idCategrorie, $nom, $type, $longueur, $reservationRepository);

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

    return view('reservations_by_habitat')->with('reservations', $reservationsParHabitat);
  }
  
}

?>