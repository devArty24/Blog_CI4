<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserInfo extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function getFullName(){
		return $this->name." ".$this->surname;
    }
}
