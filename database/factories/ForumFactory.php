<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forum;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        'name' => $name,
        'slug' => str_slug($name, '-'),
        'description' => $faker->paragraph,
    ];
});
