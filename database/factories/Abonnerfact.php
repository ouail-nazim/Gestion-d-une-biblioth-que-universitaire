<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Abonner;
use Faker\Generator as Faker;

$factory->define(Abonner::class, function (Faker $faker) {
    return [
        'num'=>$faker->numberBetween($min = 1000, $max = 9000),
        'nom'=>$faker->name,
        'prenom'=>$faker->name,
        'gender'=>$faker->randomElement($array = array ('femme','homme')),
        'telephone'=>$faker->randomElement($array = array (0540037061,06122345566,0740037456)),
        'password'=>bcrypt($faker->sentence),
        'email' => $faker->unique()->safeEmail,
    ];
});
