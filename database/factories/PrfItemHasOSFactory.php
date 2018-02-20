<?php

use Faker\Generator as Faker;

$factory->define(App\PrfItemHasOS::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 0, $max = 10),
		'estado' => $faker->randomElement($array = array ('Activo','Entregado','Pendiente')),
	];
});
