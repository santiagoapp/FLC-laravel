<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\OS::class, function (Faker $faker) {
	return [
		'proveedor' => $faker->company,
		'pago' => $faker->randomElement($array = array ('30 días','Contra entrega','Luego')),
		'nota' => $faker->text($maxNbChars = 50),
		'fecha' => Carbon::create()->subDays(rand(1,30)),
	];
});
