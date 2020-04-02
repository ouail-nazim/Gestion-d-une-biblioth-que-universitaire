<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Livre;
use Faker\Generator as Faker;

$factory->define(Livre::class, function (Faker $faker) {
    return [
        'name'=>$faker->text($maxNbChars = 30) ,
        'auteaur'=>$faker->name,
        'edition'=>$faker->company,
        'emplacment'=>$faker->numerify('range ###'),
        'annee'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'nmb_dex'=>$faker->numberBetween($min = 1, $max = 100),
        'img'=>$faker->imageUrl(),
    ];
});
