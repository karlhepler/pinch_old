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

    //////////////////////////////
    // PROTECTED STATIC METHODS //
    //////////////////////////////

    /**
     * Get the single table inheritance children
     *
     * @return array
     */
    protected static function stiChildren()
    {
        return config('pinch.accountTypes');
    }
}
