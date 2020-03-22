<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AboutService;
use Faker\Generator as Faker;

$factory->define(AboutService::class, function (Faker $faker) {
    return [
        'title' => 'Quality food',
        'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna',
    ];
});
