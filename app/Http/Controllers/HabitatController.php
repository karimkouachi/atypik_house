<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HabitatRequest;
use App\Http\Repositories\HabitatRepository;
use App\Http\Repositories\CategorieRepository;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class HabitatController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(HabitatRepository $habitatRepository)
  {
    $habitats = $habitatRepository->getHabitats();

    return view("habitats")->with("habitats", $habitats);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view("create_habitat");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(HabitatRequest $habitatRequest, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
      /*$idUtilisateur = \Auth::user()->id;
      var_dump($idUtilisateur);die;*/

      $validated = $habitatRequest->validated();

      $idCategrorie = $categorieRepository->getIdCategorie($_POST["categorie"]);
    
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
      false/*$HabitatRequest->input('actif_habitat')*/,
      true/*$HabitatRequest->input('dispo_habitat')*/,
      true/*$HabitatRequest->input('en_attente_habitat')*/,
      new \DateTime()/*$HabitatRequest->input('date_create_habitat')*/,
      new \DateTime()/*$HabitatRequest->input('date_valide_habitat')*/,
      1/*$IdProprietaire*//*$HabitatRequest->input('proprietaire_id')*/,
      $idCategrorie
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

    /*return view("habitat", compact("habitat"));*/
    return view('habitat')->with('habitat', $habitat);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id, HabitatRepository $habitatRepository)
  {
    $habitat = $habitatRepository->getHabitat($id);

    return view("edit_habitat")->with("habitat", $habitat);
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
    $idCategrorie = $categorieRepository->getIdCategorie($_POST["categorie"]);

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
    $habitat->categorie_id = $idCategrorie;

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
  public function destroy($id)
  {
    $habitat = $habitatRepository->find($id);
    $habitat->delete();

    // redirect
    Session::flash('message', "Habitat supprimé avec succès!");
    return Redirect::to('habitats');
  }
  
}

?>