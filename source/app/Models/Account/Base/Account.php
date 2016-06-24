<?php

namespace App\Models\Account\Base;

use App\Collections\Ledger;
use App\Factories\Accountant;
use App\Models\Account\Asset;
use App\Models\Account\Equity;
use App\Models\Account\Income;
use App\Models\Account\Expense;
use App\Models\Split\Base\Split;
use App\Helpers\CustomCollection;
use App\Models\Account\Liability;
use App\Models\Account\ContraAsset;
use App\Models\Account\Traits\Bootstrap;
use App\Models\Account\Traits\Relationships;
use App\Helpers\SingleTableInheritanceParent;
use App\Models\Account\Traits\AttributeModifiers;

/**
 * This is the base account class from which all accounts derive.
 * It allowed for single table inheritance, and uses the custom
 * collection type "Ledger".
 */
class Account extends SingleTableInheritanceParent
{
    use Bootstrap,
        Relationships,
        CustomCollection,
        AttributeModifiers;

    protected $table = 'accounts';
    protected $fillable = ['name', 'type', 'user_id', 'parent_account_id'];
    protected $customCollectionType = Ledger::class;

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
        }
        else {
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

    /**
     * Get the single table inheritance class map
     *
     * @return array
     */
    protected function singleTableInheritanceChildren()
    {
        return config('budget.account_types');
    }
}
