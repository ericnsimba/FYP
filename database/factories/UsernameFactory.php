<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\employee;
use Faker\Generator as Faker;

$factory->define(employee::class, function (Faker $faker) {
    return [
        'employmentNumber'=>$faker->unique()->numberBetween($min = 1, $max = 100),
        'firstname'=>$faker->firstName(),
        'surname'=>$faker->lastName(),
        'othernames'=>$faker->lastName($gender='male')
        
    ];
});
