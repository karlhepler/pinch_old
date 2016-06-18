<?php

namespace App\Accounts\Abstracts;

use App\Traits\Account\Relationships;
use Illuminate\Database\Eloquent\Model;

abstract class Account extends Model
{
    use Relationships, SingleTableInheritance;

    protected $table = 'accounts';
    protected $inheritanceMap = [
        'asset'     => \App\Account\Asset::class,
        'liability' => \App\Account\Liability::class,
        'equity'    => \App\Account\Equity::class,
        'income'    => \App\Account\Income::class,
        'expense'   => \App\Account\Expense::class,
    ];

    //////////////////////
    // ABSTRACT METHODS //
    //////////////////////

    abstract public function credit();
    abstract public function debit();
}
