<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pupil::class, function (Faker\Generator $faker) {
	$school = App\School::orderBy(DB::raw('RAND()'))->first();
	return [
		'surname' => $faker->lastName,
		'firstname' => $faker->firstName,
		'schoolenrolment' => rand(2006,2012),
		'school_id' => $school->id,
		'letter' => 'abcde'[rand(0,4)],
		'street' => $faker->streetName . ' ' . rand(1,50),
		'zipcode' => '0' . rand(1000,9999),
		'town' => $faker->city,
	];
});

$factory->define(App\School::class, function (Faker\Generator $faker) {
	return [
			'name' => $faker->lastName . ' Gymnasium',
			'street' => $faker->streetName . ' ' . rand(1,50),
			'zipcode' => '0' . rand(1000,9999),
			'town' => $faker->city,
		];
	});

$factory->define(App\Circle::class, function (Faker\Generator $faker) {
	$subject = App\Subject::orderBy(DB::raw('RAND()'))->first();
	return [
			'year' => rand(2012,2020),
			'grade' => rand(4,13),
			'subject_id' => $subject->id,
	];
});