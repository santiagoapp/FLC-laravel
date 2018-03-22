<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\RV::class, function (Faker $faker) {
	return [
		'expedicion' => Carbon::create()->subDays(rand(1,30)),
		'vencimiento' => Carbon::create()->subDays(rand(1,30)),
	];
});
