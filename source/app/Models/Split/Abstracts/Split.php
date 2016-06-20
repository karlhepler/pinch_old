<?php

namespace App\Models\Split\Abstracts;

use App\Collections\Splits;
use App\Models\Split\Debit;
use App\Models\Split\Credit;
use App\Traits\CustomCollection;
use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;
use App\Models\Split\Traits\Relationships;

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
abstract class Split extends Model
{
    use Relationships,
        CustomCollection,
        SingleTableInheritance;

    protected $table = 'splits';
    protected $customCollectionType = Splits::class;
    protected $inheritanceMap = [
        'credit' => Credit::class,
        'debit'  => Debit::class,
    ];
}