<?php

namespace App\Factories;

use Carbon\Carbon;
use App\Helpers\Money;
use App\Models\User\User;
use App\Helpers\FluentFactory;
use App\Models\Account\Equity;
use App\Models\Account\Base\Account;
use App\Models\Transaction\Transaction;
use App\Models\Account\Base\DebitAccount;

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
        $this->$Account = config('budget.account_types')[$type];

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
     * @param  integer|\App\Helpers\Money $amount
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
    public function create($shouldCreateOffsetAccount = true)
    {
        // Create the account
        $account = $this->AccountClass::create($this->attributes);

        // Record the opening balance
        $this->recordOpeningBalance();

        // Just return the account if we shouldn't
        // create the offset account
        if (! $shouldCreateOffsetAccount ) {
            return $account;
        }

        // Create the offset account
        $offsetAccount = $this->createOffsetAccount();

        // Associate this with its offset account
        $this->associateWithOffsetAccount($offsetAccount);

        // Return the account
        return $account;
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Create the offset account based on this account
     *
     * @return \App\Models\Account\Base\Account
     */
    protected function createOffsetAccount()
    {
        return (new static)
            ->forUser($this->attributes['user_id'])
            ->ofType($this->getOffsetAccountType())
            ->named($this->attributes['name'])
            ->create(false);
    }

    /**
     * Get the offset account type as a string
     *
     * @return string
     */
    protected function getOffsetAccountType()
    {
        return $this instanceof DebitAccount
            ? 'liability'
            : 'asset';
    }

    /**
     * Associate this with its offset account
     *
     * @param  Account $offsetAccount
     * @return void
     */
    protected function associateWithOffsetAccount(Account $offsetAccount)
    {
        $this->offset_account_id = $offsetAccount->id;
        $offsetAccount->offset_account_id = $this->id;

        $this->save();
        $offsetAccount->save();
    }

    /**
     * Record the opening balance
     *
     * @return void
     */
    protected function recordOpeningBalance()
    {
        // Define which direction we are pushing the balance
        $balanceDirection = (new Money($this->openingBalanceAmount))->isPositive()
            ? $this::BALANCE_INCREASE
            : $this::BALANCE_DECREASE;

        Transaction::record()
            ->on(Carbon::now())
            ->describedBy("Opening balance for {$this->name}.")
            ->andHavingSplits([
                // Increase/Decrease its balance
                [
                    'type' => array_flip(config('budget.split_types'), $balanceDirection),
                    'account_id' => $this->id,
                    'amount' => $this->openingBalanceAmount,
                ],
                // Increase/Decrease the opening balance equity account
                [
                    'type' => array_flip(config('budget.split_types'), $balanceDirection),
                    'account_id' => $this->getOpeningBalancesAccount()->id,
                    'amount' => $this->openingBalanceAmount,
                ]
            ]);
    }

    /**
     * Get the opening balances account
     *
     * @return \App\Models\Account\Equity
     */
    protected function getOpeningBalancesAccount()
    {
        return Equity::where('user_id', $this->userId)
            ->where('name', 'Opening Balances')
            ->firstOrFail();
    }
}