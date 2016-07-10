<?php

namespace App\Factories;

use App\Models\User\User;

/**
 * I couldn't come up with a creative name for this.
 * Guess what it does...
 */
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

        $user->openAssetAccount()->thatIsNamed('Accounts Receiveable');
        $user->openLiabilityAccount()->thatIsNamed('Accounts Payable');
        $user->openLiabilityAccount()->thatIsNamed('Credit Cards');
        $user->openAssetAccount()->thatIsNamed('Current Assets');
        $user->openAssetAccount()->thatIsNamed('Fixed Assets');

        return $user;
    }
}
