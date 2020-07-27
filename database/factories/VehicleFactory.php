<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use App\User;
use App\Vehicle;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(
            ['Volkswagen','Audi','Bentley','Porsche'])." ".rand(1,5),
        'cost' => $faker->randomElement(range(60000,200000,20000)),
        'branch_id' => $faker->randomElement(Branch::all()->pluck('id')->all()),
    ];
});
