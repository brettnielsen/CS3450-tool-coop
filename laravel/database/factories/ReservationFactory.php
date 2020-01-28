<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'customerID' => $faker->randomNumber(),
        'reservation_out_date' => $faker->date(),
        'reservation_in_date' => $faker->date(),
        'check_out_date' => $faker->date(),
        'check_in_date' => $faker->date(),
    ];
});
