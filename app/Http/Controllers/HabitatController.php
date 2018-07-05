<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\HabitatRequest;
use App\Http\Repositories\HabitatRepository;
use App\Http\Repositories\CategorieRepository;

class HabitatController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view("creer_habitat");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(HabitatRequest $habitatRequest, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
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

        /*return response()->json(['success'=>'Record is successfully added']);*/

        return view("activite");
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

    return view("habitat", compact("habitat"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>