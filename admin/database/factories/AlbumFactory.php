<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Album;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'title' => 'View Image',
        'description' => 'Click to open',
        'name' => 'Gallary item'
    ];
});
