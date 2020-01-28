<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ReservationItems;
use Faker\Generator as Faker;

$factory->define(ReservationItems::class, function (Faker $faker) {
    return [
        'reservationID' => $faker->randomNumber(),
        'itemID' => $faker->randomNumber(),
    ];
});
