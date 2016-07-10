<?php

namespace App\Factories;

use Carbon\Carbon;
use App\Pinch\Money;
use App\Models\User\User;
use App\Pinch\FluentFactory;
use App\Models\Account\Equity;
use App\Models\Account\Base\Account;
use App\Models\Transaction\Transaction;
use App\Models\Account\Base\DebitAccount;

/**
 * In the real world, accountants do many things.
 * In our world, accountants just create accounts.
 */
class Accountant extends FluentFactory
{
    /**
     * The fully-qualified class name
     * of the account type to create
     *
     * @var string
     */
    protected $Account;

    /**
     * The array of attributes
     * to create the account
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The opening balance amount
     *
     * @var integer
     */
    protected $openingBalanceAmount = 0;

    ////////////////////////
    // PUBLIC API METHODS //
    ////////////////////////

    /**
     * Specify the user who owns the transaction
     *
     * @param  integer|\App\Models\User\User $user
     * @return $this
     */
    public function forUser($user)
    {
        $this->attributes['user_id'] = $user instanceof User
            ? $user->id
            : $user;

        return $this;
    }

    /**
     * Specify the parent account
     * if there is one
     *
     * @param  integer|\App\Models\Account\Base\Account $parentAccount
     * @return $this
     */
    public function childOf($parentAccount)
    {
        $this->attributes['parent_account_id'] = $parentAccount instanceof Account
            ? $parentAccount->id
            : $parentAccount;

        return $this;
    }

    /**
     * Specify the type as a string
     * Reference config/budget.account_types
     *
     * @param  string $type
     * @return $this
     */
    public function ofType($type)
    {
        $this->AccountClass = config('pinch.accountTypes')[$type];

        return $this;
    }

    /**
     * Specify the name of the account
     *
     * @param  string $name
     * @return $this
     */
    public function named($name)
    {
        $this->attributes['name'] = $name;

        return $this;
    }

    /**
     * Specify an opening balance amount
     *
     * @param  integer|\App\Pinch\Money $amount
     * @return $this
     */
    public function withOpeningBalance($amount)
    {
        $this->openingBalanceAmount = $amount instanceof Money
            ? $amount->value()
            : $amount;

        return $this;
    }

    /**
     * Create the account with optional offset account
     *
     * @param  boolean $shouldCreateOffsetAccount
     * @return \App\Models\Account\Base\Account
     */
    public function create($shouldCreateOffsetAccount = false)
    {
        // Localize Account Class
        $AccountClass = $this->AccountClass;

        // Create the account
        $account = $AccountClass::create($this->attributes);

        // Record the opening balance
        $this->recordOpeningBalance($account);

        // Just return the account if we shouldn't
        // create the offset account
        if (! $shouldCreateOffsetAccount ) {
            return $account;
        }

        // Create the offset account
        $offsetAccount = $this->createOffsetAccount($account);

        // Associate the new account with its offset account
        $this->associateAccounts($account, $offsetAccount);

        // Return the account
        return $account;
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Create the offset account based on this account
     *
     * @param  \App\Models\Account\Base\Account $account
     * @return \App\Models\Account\Base\Account
     */
    protected function createOffsetAccount(Account $account)
    {
        return (new static)
            ->forUser($account->user_id)
            ->ofType($this->getOffsetAccountType($account))
            ->named($account->name)
            ->create(false);
    }

    /**
     * Get the offset account type as a string
     *
     * @param  \App\Models\Account\Base\Account $account
     * @return string
     */
    protected function getOffsetAccountType(Account $account)
    {
        return $account instanceof DebitAccount
            ? 'liability'
            : 'asset';
    }

    /**
     * Associate this with its offset account
     *
     * @param  \App\Models\Account\Base\Account $account
     * @param  \App\Models\Account\Base\Account $offsetAccount
     * @return void
     */
    protected function associateAccounts(Account $account, Account $offsetAccount)
    {
        $account->offset_account_id = $offsetAccount->id;
        $offsetAccount->offset_account_id = $account->id;

        $account->save();
        $offsetAccount->save();
    }

    /**
     * Record the opening balance
     *
     * @param  \App\Models\Account\Base\Account $account
     * @return void
     */
    protected function recordOpeningBalance(Account $account)
    {
        // Define which direction we are pushing the balance
        $balanceDirection = (new Money($this->openingBalanceAmount))->isPositive()
            ? $account::BALANCE_INCREASE
            : $account::BALANCE_DECREASE;

        Transaction::record()
            ->on(Carbon::now())
            ->describedBy("Opening balance for ({$account->type}#{$account->id}) {$account->name}.")
            ->andHavingSplits([
                // Increase/Decrease its balance
                [
                    'type' => array_flip(config('pinch.splitTypes'))[$balanceDirection],
                    'account_id' => $account->id,
                    'amount' => $this->openingBalanceAmount,
                ],
                // Increase/Decrease the opening balance equity account
                [
                    'type' => array_flip(config('pinch.splitTypes'))[$balanceDirection],
                    'account_id' => $this->getOpeningBalanceAccount()->id,
                    'amount' => $this->openingBalanceAmount,
                ]
            ]);
    }

    /**
     * Get the opening balances account
     *
     * @return \App\Models\Account\Equity
     */
    protected function getOpeningBalanceAccount()
    {
        return Equity::firstOrCreate([
            'user_id' => $this->attributes['user_id'],
            'name' => 'Opening Balances',
        ]);
    }
}
