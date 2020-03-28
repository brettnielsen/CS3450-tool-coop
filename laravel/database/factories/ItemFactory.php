<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Item::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'location' => $faker->word,
        'imagePath' => $faker->word,
        'quantity' => $faker->randomNumber(),
        'available_quantity' => $faker->randomNumber(),
    ];
});
