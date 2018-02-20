<?php

use Faker\Generator as Faker;

$factory->define(App\OT::class, function (Faker $faker) {
	return [
		'fecha_impresion' => $faker->dateTime($max = 'now', $timezone = null),
		'cliente' => $faker->company,
		'vendedor' => $faker->name,
		'ciudad' => $faker->city,
		'observacion' => $faker->text($maxNbChars = 100),
		'transporte' => $faker->streetAddress,
	];
});
