<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    $companies = Company::all()->pluck('id')->toArray();
    return [
        'email' => $faker->safeEmail,
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'company_id' => array_rand($companies, 1),
    ];
});
