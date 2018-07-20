<?php 

namespace App\Http\Controllers;

use App\Http\Repositories\ActiviteRepository;
use App\Http\Repositories\HabitatActiviteRepository;
use App\Http\Repositories\HabitatRepository;
use App\Http\Requests\ActiviteRequest;

use App\Models\Activite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Session;
use Validator;

class ActiviteController extends Controller 
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
  public function create($id, HabitatRepository $habitatRepository)
  {
    $habitat = $habitatRepository->getHabitat($id);

    $idCurrentHabitat = $habitat->id;

    return view("create_activite")->with('idCurrentHabitat', $idCurrentHabitat);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ActiviteRepository $activiteRepository, ActiviteRequest $activiteRequest, HabitatActiviteRepository $habitatActiviteRepository)
  {
    $validated = $activiteRequest->validated();

    $idCurrentHabitat = $_POST['idCurrentHabitat'];

    $activiteRepository->save(
      $_POST["libelle_activite"],
      $_POST["adresse_activite"],
      $_POST["cp_activite"],
      $_POST["ville_activite"],
      $_POST["pays_activite"],
      $_POST["descriptif_activite"]
    );

    $currentActivite = $activiteRepository->getLastCreatedActivite();
    $idCurrentActivite = $currentActivite->id;

    $habitatActiviteRepository->save(
      $idCurrentHabitat,
      $idCurrentActivite
    );

    Session::flash('message', 'Activité créée avec succès!');

    return Redirect::to('habitats');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
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