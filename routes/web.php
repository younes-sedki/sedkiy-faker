<?php

use Illuminate\Support\Facades\Route;
use Sedkiy\Faker\SedkiyFaker;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $locales = ['ar_MA', 'ar_DZ', 'ar_SA', 'de_DE', 'fr_FR', 'en_GB', 'en_US', 'nl_BE'];
    $data = [];

    foreach ($locales as $locale) {
        $faker = SedkiyFaker::locale($locale)->make();
        
        $data[$locale] = [
            'name' => $faker->name(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'address' => $faker->address(),
            'city' => $faker->city(),
            'phone' => $faker->phoneNumber(),
            'mobile' => $faker->mobileNumber(),
            'email' => $faker->freeEmail(),
            'domain' => $faker->domainName(),
        ];
    }

    return view('test', compact('data'));
});
