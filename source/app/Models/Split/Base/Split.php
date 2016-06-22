<?php

namespace App\Models\Split\Base;

use App\Collections\Splits;
use App\Models\Split\Debit;
use App\Models\Split\Credit;
use App\Helpers\CustomCollection;
use App\Models\Split\Traits\Bootstrap;
use App\Models\Split\Traits\Relationships;
use App\Helpers\SingleTableInheritanceParent;
use App\Models\Split\Traits\AttributeModifiers;

/**
 * A split is a single split of itemization of an account
 * in a transaction and in the account's ledger.
 * 
 * In the future, I might add an optional field for commodity,
 * which will allow the user to keep track of the specific thing
 * bought/sold on this split. This might allow the system to catch
 * wind of it, figure out if it is an asset, and recommend a
 * sinking fund for it.
 */
class Split extends SingleTableInheritanceParent
{
    use Bootstrap,
        Relationships,
        CustomCollection,
        AttributeModifiers;

    protected $table = 'splits';
    protected $fillable = ['type', 'amount', 'memo', 'account_id', 'transaction_id'];
    protected $customCollectionType = Splits::class;

    /**
     * Get the single table inheritance class map
     *
     * @return array
     */
    protected function singleTableInheritanceClassMap()
    {
        return config('budget.split_types');
    }
}