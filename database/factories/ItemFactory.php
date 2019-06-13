<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, true),
        'description' => $faker->realText($faker->numberBetween(10, 100)),
        'user_id' => rand(1, 100),
        // Image generation provided by LoremPixel (http://lorempixel.com/)
        'image_url' => $faker->imageUrl(100, 100),
    ];
});
