<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bid;
use Faker\Generator as Faker;

$factory->define(Bid::class, function (Faker $faker) {

    $created = $faker->dateTimeBetween('-30 days', '-1 days');

    return [
        'event_id' => rand(1,15),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'price' => $faker->randomFloat(2, 1, 1000),
        'created_at' => $created,
        'updated_at' => $created,
    ];
});
