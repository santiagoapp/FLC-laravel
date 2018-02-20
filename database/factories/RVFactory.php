<?php

use Faker\Generator as Faker;

$factory->define(App\RV::class, function (Faker $faker) {
	return [
		'expedicion' => $faker->dateTime($max = 'now', $timezone = null),
		'vencimiento' => $faker->dateTime($max = 'now', $timezone = null),
	];
});
