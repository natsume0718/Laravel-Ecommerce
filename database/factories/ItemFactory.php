<?php

use Faker\Generator as Faker;
use App\Item;

$factory->define(Item::class, function (Faker $faker) {
	return [
		'name'=>$faker->realText($maxNbChars=10,$indexSize=1),
		'detail'=>$faker->realText($maxNbChars=200,$indexSize=1),
		'price'=>$faker->numberBetween($min=100,$max=5000),
		'stock'=>$faker->numberBetween($min=1,$max=100),
    ];
});
