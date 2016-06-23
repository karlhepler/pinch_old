<?php

namespace App\Factories;

use App\Models\Account\Asset;
use App\Models\Account\Liability;
use App\Models\Account\Base\DebitAccount;

class Accountant
{
    /**
     * Create a new account and its offset account,
     * linking them together
     *
     * @param  array  $attributes
     * @return \App\Models\Account\Base\Account
     */
    public static function create(array $attributes)
    {
        // Get the account class
        $AccountClass = config('budget.account_types')[$attributes['type']];

        // Create the account
        $account = $AccountClass::create($attributes);

        // Now create the offset account
        $offsetAccount = $account instanceof DebitAccount
            ? Liability::create(['name' => "Accounts Payable: {$account->name}"])
            : Asset::create(['name' => "Accounts Receivable: {$account->name}"]);

        // Associate them with each other
        $account->offset_account_id = $offsetAccount->id;
        $offsetAccount->offset_account_id = $account->id;

        // Save them
        $account->save();
        $offsetAccount->save();

        // Return the account
        return $account;
    }
}