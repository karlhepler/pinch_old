<?php

namespace App\Factories;

use App\Models\User\User;

class UserFactory
{
    /**
     * Create & setup a new user
     *
     * @param  array $attributes
     * @return \App\Models\User\User
     */
    public static function create(array $attributes)
    {
        $user = User::create($attributes);

        $user->createAccount()->ofType('equity')->andNamed('Opening Balances');
        $user->createAccount()->ofType('asset')->andNamed('Current Assets');
        $user->createAccount()->ofType('asset')->andNamed('Accounts Receiveable');
        $user->createAccount()->ofType('liability')->andNamed('Credit Cards');
        $user->createAccount()->ofType('liability')->andNamed('Accounts Payable');

        return $user;
    }
}