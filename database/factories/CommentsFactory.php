<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Sistema\Comments;
use Faker\Generator as Faker;
use Sistema\User;

$factory->define(Comments::class, function (Faker $faker) {
	return [
		'message' => $faker->text(),
		'user_id' => User::all()->random()->id,
	];
});
