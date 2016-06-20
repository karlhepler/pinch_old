<?php

namespace App\Models\Line\Abstracts;

use App\Collections\Lines;
use App\Models\Line\Debit;
use App\Models\Line\Credit;
use App\Traits\CustomCollection;
use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;
use App\Models\Line\Traits\Relationships;

/**
 * A line is a single line of itemization of an account
 * in a transaction and in the account's ledger.
 * 
 * In the future, I might add an optional field for commodity,
 * which will allow the user to keep track of the specific thing
 * bought/sold on this line. This might allow the system to catch
 * wind of it, figure out if it is an asset, and recommend a
 * sinking fund for it.
 */
abstract class Line extends Model
{
    use Relationships,
        CustomCollection,
        SingleTableInheritance;

    protected $table = 'lines';
    protected $customCollectionType = Lines::class;
    protected $inheritanceMap = [
        'credit' => Credit::class,
        'debit'  => Debit::class,
    ];
}