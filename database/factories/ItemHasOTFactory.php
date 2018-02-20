<?php

use Faker\Generator as Faker;
use App\Item;

$factory->define(App\ItemHasOT::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),
		'fecha_entrega' => $faker->dateTime($max = 'now', $timezone = null),
	];
});
