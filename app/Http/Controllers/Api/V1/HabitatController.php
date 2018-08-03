<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Transformers\HabitatTransformer;
use App\Http\Repositories\HabitatRepository;
use App\Models\Habitat;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

class HabitatController extends Controller
{
    use Helpers;
  
    public function get_habitats(Request $request, HabitatRepository $habitatRepository) : Response
    {
        return $this->response->collection($habitatRepository->getAllHabitats(), new HabitatTransformer);
    }

    public function get_habitat(Request $request, HabitatRepository $habitatRepository, $id) : Response
    {
    	return $this->response->item($habitatRepository->getHabitat($id), new HabitatTransformer);
    }

    public function get_habitats_by_one_categorie(Request $request, HabitatRepository $habitatRepository, $id) : Response
    {
    	return $this->response->collection($habitatRepository->getHabitatsByOneCategorie($id), new HabitatTransformer);
    }

    public function get_habitats_by_owner(Request $request, HabitatRepository $habitatRepository, $id) : Response
    {
    	return $this->response->collection($habitatRepository->getHabitatsByOwner($id), new HabitatTransformer);
    }
}