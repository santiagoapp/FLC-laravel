<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\OT::class, function (Faker $faker) {
	return [
		'fecha_impresion' => Carbon::create()->subDays(rand(1,30)),
		'cliente' => $faker->company,
		'vendedor' => $faker->name,
		'ciudad' => $faker->city,
		'observacion' => $faker->text($maxNbChars = 100),
		'transporte' => $faker->streetAddress,
	];
});
