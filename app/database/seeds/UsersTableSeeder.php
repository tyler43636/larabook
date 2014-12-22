<?php

use Faker\Factory as Faker;
use Larabook\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			User::create([
                'username' => $faker->firstName . $index,
                'email' => $faker->email . $index,
                'password' => 'secret'
			]);
		}
	}

}
