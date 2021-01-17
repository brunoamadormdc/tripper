<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\timeline;
use Faker\Generator as Faker;

$factory->define(timeline::class, function (Faker $faker) {

    return [
        'tipo_publicacao' => $faker->word,
        'destino' => $faker->word,
        'titulo' => $faker->word,
        'subtitulo' => $faker->word,
        'titulo_foto' => $faker->word,
        'comentario' => $faker->text,
        'foto' => $faker->word,
        'usuario_post' => $faker->word,
        'data_post' => $faker->word
    ];
});
