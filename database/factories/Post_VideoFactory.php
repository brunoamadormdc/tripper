<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post_Video;
use Faker\Generator as Faker;

$factory->define(Post_Video::class, function (Faker $faker) {

    return [
        'video_link' => $faker->word,
        'video_id' => $faker->word,
        'published' => $faker->word,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
        'post_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
