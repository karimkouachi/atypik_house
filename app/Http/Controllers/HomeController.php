<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ReservationRepository;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReservationRepository $reservationRepository)
    {

        $locataireId = Auth::user()->id;

        $mesReservations = $reservationRepository->getReservationsByTenantId($locataireId);

        var_dump($mesReservations);die;

        return view('home')->with("reservations", $mesReservations);
    }
}
