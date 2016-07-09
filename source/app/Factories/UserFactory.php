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

        $user->openAssetAccount()->andNamed('Accounts Receiveable');
        $user->openLiabilityAccount()->andNamed('Accounts Payable');
        $user->openLiabilityAccount()->andNamed('Credit Cards');
        $user->openAssetAccount()->andNamed('Current Assets');
        $user->openAssetAccount()->andNamed('Fixed Assets');

        return $user;
    }
}
