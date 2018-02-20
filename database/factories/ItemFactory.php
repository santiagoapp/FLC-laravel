<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
	$z = 0;
	for ($i=1; $i < 12; $i++) { 
		$aleatorio = $faker->numberBetween($min = 0, $max = 100)/100;
		$z = $aleatorio + $z;
	}
	$z = $z-6;
	$normal = $z*3+5;
	return [
		'codigo' => 'MP' . $faker->numberBetween($min = 1000, $max = 9000),
		'descripcion' => $faker->text($maxNbChars = 100),
		'existencias' => $normal,
	];
});
