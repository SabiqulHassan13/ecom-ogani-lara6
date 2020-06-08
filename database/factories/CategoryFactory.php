<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'                  =>  $faker->sentence($nbWords = 2, $variableNbWords = true),
        'description'           =>  $faker->text,
        'image'                 =>  'frontend/img/categories/cat-2.jpg',
        'publication_status'    =>  $faker->boolean,
    ];
});
