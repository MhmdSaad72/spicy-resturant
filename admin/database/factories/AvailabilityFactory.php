<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Availability;
use Faker\Generator as Faker;

$factory->define(Availability::class, function (Faker $faker) {
    return [
        'title' => 'Availability',
        'description' => 'Opening hours',
        'start_day' => 2,
        'end_day' => 5,
        'start_time' => '09:30',
        'end_time' => '20:30'
    ];
});
