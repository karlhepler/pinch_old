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