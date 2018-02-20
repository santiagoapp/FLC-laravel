<?php

use Faker\Generator as Faker;

$factory->define(App\MaqItemHasOS::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),
		'fecha' => $faker->dateTime($max = 'now', $timezone = null),
	];
});
