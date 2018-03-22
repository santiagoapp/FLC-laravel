<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Item;

$factory->define(App\ItemHasOT::class, function (Faker $faker) {
	return [
		'cantidad' => $faker->numberBetween($min = 1, $max = 10),
		'fecha_entrega' => Carbon::create()->subDays(rand(1,7)),
	];
});
