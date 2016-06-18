<?php

namespace App\Models\Account\Abstracts;

use App\Collections\Ledger;
use App\Models\Account\Asset;
use App\Models\Account\Equity;
use App\Models\Account\Income;
use App\Models\Account\Expense;
use App\Models\Account\Liability;
use App\Models\Entry\Abstracts\Entry;
use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account\Traits\Relationships;

abstract class Account extends Model
{
    use Relationships,
        CustomCollection,
        SingleTableInheritance;

    protected $table = 'accounts';
    protected $customCollectionType = Ledger::class;
    protected $inheritanceMap = [
        'asset'     => Asset::class,
        'liability' => Liability::class,
        'equity'    => Equity::class,
        'income'    => Income::class,
        'expense'   => Expense::class,
    ];

    /**
     * Add an entry to the account
     * and return the account balance
     *
     * @param  \App\Models\Entry\Abstracts\Entry  $entry
     * @return \App\Money
     */
    abstract public function record(Entry $entry);

    // Actually, recording the entry doesn't, itself,
    // increase the balance. Math must be done to determine
    // the balance after the entry has already been recorded.
    // Therefor, it's not the recording of the entry itself
    // that needs to be altered for different account types.
    // It's how the balance is calculated.
    // 
    // That being said, if there are a million different entries
    // in this account, then recalculating the balance
    // every time would take a long time and be dumb.
    // The balance should be increased/decreased with every
    // entry recorded to save time. This should be saved
    // to the account model.
}
