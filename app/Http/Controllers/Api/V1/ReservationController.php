 <?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Transformers\ReservationTransformer;
use App\Http\Repositories\ImageRepository;
use App\Http\Repositories\ReservationRepository;
use App\Models\Reservation;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

use Auth;

class ReservationController extends Controller
{
    use Helpers;

    public function get_reservation(Request $request, ReservationRepository $reservationRepository, $id) : Response
    {
        return $this->response->item($reservationRepository->getReservationById($id), new ReservationTransformer);
    }
  
    public function get_reservations_by_tenant(Request $request, ReservationRepository $reservationRepository, $id) : Response
    {
        return $this->response->collection($reservationRepository->getReservationsByTenantId($id), new ReservationTransformer);
    }

    public function get_reservations_by_habitat(Request $request, ReservationRepository $reservationRepository, $id) : Response
    {
        return $this->response->collection($reservationRepository->getReservationsByHabitat($id), new ReservationTransformer);
    }

    public function comment_stay(Request $request, ReservationRepository $reservationRepository, $id)
    {
        $reservationRepository->commentStay($id, $_POST['commentaire_reservation']);
    }

    public function post_image(Request $request, ImageRepository $imageRepository, ReservationRepository $reservationRepository, $id)
    {
        $reservation = $reservationRepository->getReservationById($id);

        $habitatId = $reservation->habitat_id;
        $membreId = Auth::user()->id;

        $imageRepository->save($request[0], $habitatId, $membreId);
    }
}