<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Destino;
use Faker\Generator as Faker;

$factory->define(Destino::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'body' => $faker->text,
        'main_image' => $faker->word,
        'secondary_image' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
