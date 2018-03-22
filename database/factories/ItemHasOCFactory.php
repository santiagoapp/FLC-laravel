<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\ItemHasOC::class, function (Faker $faker) {
	return [
		'fecha' => Carbon::create()->subDays(rand(1,30)),
		// 'fecha' => $faker->dateTime($max = 'now', $timezone = null),
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),

	];
});
