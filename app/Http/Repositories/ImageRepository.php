<?php

namespace App\Http\Repositories;

use App\Models\Image;
use Carbon\Carbon;

class ImageRepository implements ImageRepositoryInterface
{    

	protected $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

	public function save($url_image, $habitat_id, $membre_id)
	{

        $date_image = Carbon::now('Europe/Paris');

        $this->image->url_image = $url_image;
        $this->image->date_image = $date_image;
        $this->image->habitat_id = $habitat_id;
        $this->image->membre_id = $membre_id;

        $this->image->save();
	}
	
}