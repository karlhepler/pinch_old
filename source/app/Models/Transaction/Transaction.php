<?php

namespace App\Models\Transaction;

use App\Collections\Journal;
use App\Traits\CustomCollection;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Relationships,
        CustomCollection;

    protected $customCollectionType = Journal::class;

    public function split(Account $account, Money $amount)
    {
        // When a transaction adds a split,
        // it is basically saying "I want to CREDIT this account.."
        // OR "I want to DEBIT this account.." ... "with this amount of Money"

        // The transaction already exists at this point
        // The account also already exists at this point
        $credit = new Credit($amount); // Entries also need transaction id & account id
        $account->record($credit);

        $debit = new Debit($amount);
        $account->record($debit);

        // So I need to figure out what really happens in a typical transaction
    }
}
