<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => \App\User::all()->random()->id,
        'forum_id' => \App\Forum::all()->random()->id,
        'title' => $title,
        'slug' => str_slug($title, '-'),
        'description' => $faker->paragraph,
    ];
});
