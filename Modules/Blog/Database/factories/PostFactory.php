<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Blog\Entities\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'   => $faker->word,
        'content' => $faker->sentence,
    ];
});
