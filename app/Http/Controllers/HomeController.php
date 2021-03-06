<?php

namespace App\Http\Controllers;


use App\Http\Repositories\ReservationRepository;
use App\Http\Repositories\UsersRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;

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

        /*var_dump($mesReservations);die;*/

        return view('home')->with("reservations", $mesReservations);
    }

    public function disable_account($id, UsersRepository $usersRepository, Request $request){

        $usersRepository->disableAccount($id);

        Auth::logout();


        Session::flash('message', 'Compte desactivé!');

        return Redirect::to('home');
    }
}
