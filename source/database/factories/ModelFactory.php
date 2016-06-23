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
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
/**
 * Merchant
 */
$factory->define(App\Models\Merchant\Merchant::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
    ];
});

/**
 * Random Account Type
 */
$factory->define(App\Models\Account\Base\Account::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'type' => $faker->randomElement(array_keys(config('budget.account_types'))),
    ];
});

/**
 * Asset Account
 */
$factory->define(App\Models\Account\Asset::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'normal_balance' => 0,
    ];
});

/**
 * ContraAsset Account
 */
$factory->define(App\Models\Account\ContraAsset::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'normal_balance' => 0,
    ];
});

/**
 * Equity Account
 */
$factory->define(App\Models\Account\Equity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'normal_balance' => 0,
    ];
});

/**
 * Expense Account
 */
$factory->define(App\Models\Account\Expense::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'normal_balance' => 0,
    ];
});

/**
 * Income Account
 */
$factory->define(App\Models\Account\Income::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'normal_balance' => 0,
    ];
});

/**
 * Liability Account
 */
$factory->define(App\Models\Account\Liability::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'normal_balance' => 0,
    ];
});
