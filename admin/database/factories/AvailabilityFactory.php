<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Availability;
use Faker\Generator as Faker;

$factory->define(Availability::class, function (Faker $faker) {
    return [
        'title' => 'Availability',
        'description' => 'Opening hours',
        'start_date' => '2020-2-20 9:30',
        'end_date' => '2020-2-28 18:30',
    ];
});
