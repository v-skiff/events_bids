<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {

    $caption =  $faker->realText(rand(10, 40));
    $created = $faker->dateTimeBetween('-60 days', '-31 days');

    return [
        'caption' => $caption,
        'created_at' => $created,
        'updated_at' => $created,
    ];
});
