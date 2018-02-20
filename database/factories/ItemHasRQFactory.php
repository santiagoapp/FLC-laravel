<?php

use Faker\Generator as Faker;

$factory->define(App\ItemHasRQ::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),
		'compra' => $faker->boolean(50),
		'servicio' => $faker->boolean(50),
		'estado' => $faker->randomElement($array = array ('Activo','Entregado','Pendiente')),
		'fecha' => $faker->dateTime($max = 'now', $timezone = null),
	];
});
