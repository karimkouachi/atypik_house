<?php

namespace App\Http\Repositories;

interface ImageRepositoryInterface
{
	public function save($url_image, $habitat_id, $membre_id);
}