<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    return view("habitat");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(HabitatRequest $HabitatRequest, HabitatRepository $habitatRepository, CategorieRepository $categorieRepository)
  {
      $validator = \Validator::make($HabitatRequest->all(), [
          'nom_habitat' => 'required',
          'nombre_habitat' => 'required',
          'prix_habitat' => 'required',
          'adresse_habitat' => 'required',
          'cp_habitat' => 'required',
          'ville_habitat' => 'required',
          'pays_habitat' => 'required',
          'num_habitat' => 'required',
          'photo_habitat' => 'required'
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $idCategrorie = $categorieRepository->getIdCategorie($_POST['inputs'][1]);
    
        $habitatRepository->save(
          $_POST['inputs'][0],
          $_POST['inputs'][2],
          $_POST['inputs'][3],
          $_POST['inputs'][4],
          $_POST['inputs'][5],
          $_POST['inputs'][6],
          $_POST['inputs'][7],
          $_POST['inputs'][8],
          $_POST['inputs'][9],
          false/*$HabitatRequest->input('actif_habitat')*/,
          true/*$HabitatRequest->input('dispo_habitat')*/,
          true/*$HabitatRequest->input('en_attente_habitat')*/,
          new DateTime()/*$HabitatRequest->input('date_create_habitat')*/,
          new DateTime()/*$HabitatRequest->input('date_valide_habitat')*/,
          1/*$IdProprietaire*//*$HabitatRequest->input('proprietaire_id')*/,
          $idCategrorie
        );

        return response()->json(['success'=>'Record is successfully added']);
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