<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);


    return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'remember_token' => Str::random(10),
		'staff_no' => strtoupper(Str::random(3)) . '/' . rand(10000000, 99999999) . '/' . rand(13, 19),
		'national_id' => rand(10000000, 99999999),
		'department_id' => rand(1, 25),
		'campus_id' => rand(1, 6),
		'designation_id' => rand(1, 11),
		'job_group_id' => rand(1, 11),
        'appointed_at' => $faker->date(),
        'gender' => ucwords($gender)
//		'job_description' => $faker->paragraph
	];
});
