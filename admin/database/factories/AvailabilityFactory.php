<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Availability;
use Faker\Generator as Faker;

$factory->define(Availability::class, function (Faker $faker) {
    return [
        'title' => 'Availability',
        'description' => 'Opening hours',
        'availability' => "1,2,3,4,5",
        'start_time' => '09:30',
        'end_time' => '20:30'
    ];
});
