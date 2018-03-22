<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\RE::class, function (Faker $faker) {
	return [
		'proveedor' => $faker->name,
		'fecha' => Carbon::create()->subDays(rand(1,30)),
	];
});
