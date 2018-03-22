<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\MaqItemHasOS::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),
		'fecha' => Carbon::create()->subDays(rand(1,30)),
	];
});
