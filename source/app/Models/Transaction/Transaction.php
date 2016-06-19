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

    public function addEntry(Account $account, Money $amount)
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

        // When we ADD AN ENTRY,
        // We are adding it to the journal AND the ledger
        // AT THE SAME TIME!!!

        // A transaction is the vessel that controls the adding
        // of a journal/ledger entry to the journal/ledger
        // The entry is essentially the same, but the context is different.

        // In both the journal entry and the ledger entry, (posting - post to ledger)
        // there is an associated date, which initially makes me think there is
        // a date that is associated with each line of the journal entry. However,
        // that seems a little too redundant. The journal entry as a whole, with
        // all of its lines intact, has a date. The date follows each line as it is
        // posted to the ledger only by association. It is written out of convenience.
        
        // A transaction, it seems, is a synonym for journal entry.

        // No. The transaction is what happened. It facilitates the need for a journal entry.
        // The journal entry is the written documentation that describes the transaction.
        // So, in this context, it could technically be a synonym... but I'm not sure if
        // I want to do that.

        // I could imagine a button that says something like "A transaction occurred!".
        // You click it and it prompts you to fill out a journal entry.

        // There doesn't seem to be a single concise word for lines in a journal entry.
        // So, I think I'll just call them lines.

        // To that effect, I believe that a "ledger entry" isn't even a thing. You post
        // your journal entry to the ledger. You copy each line of the entry and write it
        // under the correct column in the ledger, under the correct account. In doing so,
        // you make a reference back to where it came from.

        // So, what's a transaction? It's an exchange of goods/services between two merchants.
        // That's it. You are giving bob $100 for a saw.
        // You & Bob are merchants.
        // The exchange is $100 for one saw.
        // You now own a saw, which is an asset.

        // Expenses get consumed/used-up within a year
        // Assets keep on going and continue to have value after a year

        // Most things you buy day-to-day are expenses
        // However, big purchases, like cars, TVs, computers, etc are assets
        // Some assets depreciate. Expenses depreciate basically immediately (within a year)
        // A house probably won't depreciate... neither will land.
        // However, a car will. After a certain amount of years, that car will be worthless.
        // Once it's worthless, then it makes sense to replace it. Until then,
        // it's worth having it.

        // A LINE of credit is LITERALLY a LINE in the journal entry... of credit.

        /*
         * Account
         * * DebitAccount
         * * * Asset - balance sheet
         * * * Expense - income statement
         * * CreditAccount
         * * * Liability - balance sheet
         * * * Revenue - income statement
         * * * Equity - balance sheet
         * Ledger
         * Journal
         * JournalEntry / Transaction
         * Line / LineItem
         * * This should contain an optional commodity value
         * * This can be used to automatically choose the right kind of account & calculate depreciation
         * Merchant
         * * Fairly inconsequential - just for catorigization
         * Money
         * * Not even a model - just a type that the amounts are cast to
         */
    }
}
