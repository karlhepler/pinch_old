<?php

namespace App\Models\Account\Base;

use App\Collections\Ledger;
use App\Models\Account\Asset;
use App\Models\Account\Equity;
use App\Models\Account\Income;
use App\Models\Account\Expense;
use App\Helpers\CustomCollection;
use App\Models\Account\Liability;
use App\Models\Account\ContraAsset;
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
    use Relationships,
        CustomCollection,
        AttributeModifiers;

    protected $table = 'accounts';
    protected $fillable = ['name', 'type'];
    protected $customCollectionType = Ledger::class;

    /**
     * Get the single table inheritance class map
     *
     * @return array
     */
    protected function singleTableInheritanceClassMap()
    {
        return config('budget.account_types');
    }
}
