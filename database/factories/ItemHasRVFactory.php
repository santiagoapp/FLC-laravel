<?php

use Faker\Generator as Faker;

$factory->define(App\ItemHasRV::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),
		'nota' => $faker->text($maxNbChars = 50),
	];
});
