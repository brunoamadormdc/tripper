<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post_comment;
use Faker\Generator as Faker;

$factory->define(Post_comment::class, function (Faker $faker) {

    return [
        'post_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'email' => $faker->word,
        'name' => $faker->word,
        'webpage' => $faker->word,
        'body' => $faker->word,
        'published' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
