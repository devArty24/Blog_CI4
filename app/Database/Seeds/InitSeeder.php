<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class InitSeeder extends Seeder
{
	public function run()
	{
		/* Call any seeders */
		$this->call('CountriesSeeder');
		$this->call('GroupsSeeder');
	}
}
