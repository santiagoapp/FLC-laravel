<?php

use Faker\Generator as Faker;

$factory->define(App\ItemHasRE::class, function (Faker $faker) {
	return [
		'nota' => $faker->text($maxNbChars = 50),
	];
});
