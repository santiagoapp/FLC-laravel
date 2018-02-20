<?php

use Faker\Generator as Faker;

$factory->define(App\OS::class, function (Faker $faker) {
	return [
		'proveedor' => $faker->company,
		'pago' => $faker->randomElement($array = array ('30 días','Contra entrega','Luego')),
		'nota' => $faker->text($maxNbChars = 50),
		'fecha' => $faker->dateTime($max = 'now', $timezone = null),
	];
});
