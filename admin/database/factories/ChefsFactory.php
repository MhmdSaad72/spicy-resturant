<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chef;
use Faker\Generator as Faker;

$factory->define(Chef::class, function (Faker $faker) {
    return [
        'name' => 'Samuel Carrick',
        'description' => 'Senior chef supervisor',
        'image' => 'image',
        'facebook' => 'https://www.facebook.com',
        'twitter' => 'https://www.twitter.com',
        'instagram' => 'https://www.instagram.com',
        'youtube' => 'https://www.youtube.com',
    ];
});
