<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\TransactionRepository;
use Auth;
use Response;

class TransactionController extends Controller 
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
  public function create(TransactionRepository $transactionRepository, TypeTransactionRepository $typeTransactionRepository)
  {
    $montant = $_GET['montant'];
    $date = new \DateTime();
    $tx = 10;

    $idLocataire = Auth::user()->id;

    $type = $_GET['type'];
    $idType = $typeTransactionRepository->getTypeByLibelle($type);

    $proprietaire = $_GET['proprietaire'];
    $idProprietaire = $userRespository->getUserByPseudo($proprietaire);

    $idReservation = 1 /*$_GET['idReservation']*/;

    $transactionRepository->create($montant, $date, $tx, $idLocataire, $idType, $proprietaire, $idReservation);

    return Response::json('Transaction éffectuée');;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
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