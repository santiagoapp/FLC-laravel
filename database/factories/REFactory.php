<?php

use Faker\Generator as Faker;

$factory->define(App\RE::class, function (Faker $faker) {
	return [
		'proveedor' => $faker->name,
		'fecha' => $faker->dateTime($max = 'now', $timezone = null),

	];
});
