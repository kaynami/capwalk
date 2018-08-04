<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'content' => $faker->text($maxNbChars = 200) ,
        'subtitle' => $faker->text($maxNbChars = 20) ,
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'user_id' => $faker->numberBetween($min = 1, $max = 11),
        'category_id' => 0
    ];
});
