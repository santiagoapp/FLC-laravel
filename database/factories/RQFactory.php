<?php

use Faker\Generator as Faker;

$factory->define(App\RQ::class, function (Faker $faker) {
	return [
		'solicita' => $faker->name,
		'autoriza' => $faker->name,
		'fecha' => $faker->dateTime($max = 'now', $timezone = null),
	];
});
