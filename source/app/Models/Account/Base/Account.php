<?php

namespace App\Models\Account\Base;

use App\Collections\Ledger;
use App\Factories\Accountant;
use App\Models\Split\Base\Split;
use App\Pinch\CustomCollection;
use OldTimeGuitarGuy\SingleTableInheritance\StiParent;

/**
 * This is the base account class from which all accounts derive.
 * It allowed for single table inheritance, and uses the custom
 * collection type "Ledger".
 */
class Account extends StiParent
{
    use CustomCollection,
        Traits\Bootstrap,
        Traits\Relationships,
        Traits\AttributeMutators;

    /** Account Types */
    const ASSET     = 1;
    const EQUITY    = 2;
    const EXPENSE   = 3;
    const INCOME    = 4;
    const LIABILITY = 5;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'user_id', 'parent_account_id'
    ];

    /**
     * A hash of children.
     * ex: ['stringType' => ActualType::class, ...]
     *
     * @var array
     */
    protected static $stiChildren = [
        static::ASSET     => \App\Models\Account\Asset::class,
        static::EQUITY    => \App\Models\Account\Equity::class,
        static::EXPENSE   => \App\Models\Account\Expense::class,
        static::INCOME    => \App\Models\Account\Income::class,
        static::LIABILITY => \App\Models\Account\Liability::class,
    ];

    /**
     * The fully-qualified classname
     * of the custom collection type
     * you would like to use for this model.
     *
     * @var string
     */
    protected $customCollectionType = Ledger::class;

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Adjust the balance, normal balance, & negative balance
     * based on the kind of split
     *
     * @param  \App\Models\Split\Base\Split  $split
     * @return $this
     */
    public function updateBalance(Split $split)
    {
        if ( is_a($split, $this::BALANCE_INCREASE) ) {
            $this->balance = $this->balance->sum($split->amount);
            $this->normal_balance = $this->normal_balance->sum($split->amount);
        } else {
            $this->balance = $this->balance->diff($split->amount);
            $this->negative_balance = $this->negative_balance->sum($split->amount);
        }

        return $this;
    }

    /**
     * Create a child account
     *
     * @return \App\Factories\Accountant
     */
    public function createChildAccount()
    {
        return (new Accountant)
            ->forUser($this->user)
            ->childOf($this)
            ->ofType($this->type);
    }

    /**
     * Create a sibling account
     *
     * @return \App\Factories\Accountant
     */
    public function createSiblingAccount()
    {
        return (new Accountant)
            ->forUser($this->user)
            ->childOf($this->parent_account)
            ->ofType($this->type);
    }
}
