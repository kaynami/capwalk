<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->catchPhrase;
    return [
        'title' => $title,
        'content' => $faker->text($maxNbChars = 200) ,
        'subtitle' => $faker->text($maxNbChars = 20) ,
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'user_id' => $faker->numberBetween($min = 1, $max = 11),
        'pointer' => str_replace(' ', '-', strtolower($title)),
        'category_id' => App\Category::all()->first()->id
    ];
});
