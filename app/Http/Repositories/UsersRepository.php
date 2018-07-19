<?php

namespace App\Http\Repositories;

use App\User;

class UsersRepository implements UsersRepositoryInterface
{    

	protected $users;

	public function __construct(User $users)
	{
		$this->users = $users;
	}

	public function disableAccount($id){
		$users = $this->users->where('id', $id)->update(['actif_membre' => 0]);

        return $users;
	}
}