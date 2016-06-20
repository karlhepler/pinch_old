<?php

namespace App\Models\Account\Base;

use App\Collections\Ledger;
use App\Models\Account\Asset;
use App\Models\Account\Equity;
use App\Models\Account\Income;
use App\Models\Account\Expense;
use App\Traits\CustomCollection;
use App\Models\Account\Liability;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account\Traits\Relationships;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

/**
 * This is the base account class from which all accounts derive.
 * It allowed for single table inheritance, and uses the custom
 * collection type "Ledger".
 */
class Account extends Model
{
    use Relationships,
        CustomCollection,
        SingleTableInheritanceTrait;

    protected $table = 'accounts';
    protected $fillable = ['name', 'type'];
    protected $customCollectionType = Ledger::class;
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [
        Asset::class,
        ContraAsset::class,
        Equity::class,
        Expense::class,
        Income::class,
        Liability::class,
    ];
}
