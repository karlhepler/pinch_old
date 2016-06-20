<?php

namespace App\Models\Account\Abstracts;

use App\Collections\Ledger;
use App\Models\Account\Asset;
use App\Models\Account\Equity;
use App\Models\Account\Income;
use App\Models\Account\Expense;
use App\Traits\CustomCollection;
use App\Models\Account\Liability;
use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account\Traits\Relationships;

/**
 * This is the base account class from which all accounts derive.
 * It allowed for single table inheritance, and uses the custom
 * collection type "Ledger".
 */
abstract class Account extends Model
{
    use Relationships,
        CustomCollection,
        SingleTableInheritance;

    protected $table = 'accounts';
    protected $fillable = ['name', 'type'];
    protected $customCollectionType = Ledger::class;
    protected $inheritanceMap = [
        'asset'        => Asset::class,
        'contra_asset' => ContraAsset::class,
        'liability'    => Liability::class,
        'equity'       => Equity::class,
        'income'       => Income::class,
        'expense'      => Expense::class,
    ];
}
