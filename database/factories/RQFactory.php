<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\RQ::class, function (Faker $faker) {
	return [
		'solicita' => $faker->randomElement($array = array ('REAY BOSA HILDER JAVIER','GARZON TRIANA MIGUEL ANGEL','ESPINOSA TRUJILLO ANDRES FABIAN','OTRO')),
		'autoriza' => $faker->randomElement($array = array ('REAY BOSA HILDER JAVIER','GARZON TRIANA MIGUEL ANGEL','ESPINOSA TRUJILLO ANDRES FABIAN','OTRO')),
		'fecha_generacion' => Carbon::create()->subDays(rand(1,30)),
	];
});
