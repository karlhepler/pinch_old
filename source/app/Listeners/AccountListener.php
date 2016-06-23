<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\Event;
use App\Helpers\EventSubscriber;
use App\Models\Transaction\Transaction;

class AccountListener extends EventSubscriber
{
    /**
     * The account is about to save!
     *
     * We need to make sure the account balance isn't negative.
     * If it is, then we need to create a journal entry (transaction)
     * to offset it. It should be offset with its related offset account.
     * For debit accounts, this should be Accounts Payable: {Asset Name}
     * For credit accounts, this should be Accounts Receivable: {Asset Name}
     *
     * @param  Event  $event
     * @return void
     */
    public function onAccountSaving(Event $event)
    {
        // We can skip all of this if the account balance is positive
        if ( $event->account->balance->isPositive() ) {
            return;
        }

        // We have a negative balance! We need to create an offsetting transaction.
        Transaction::record()
            ->on(Carbon::now())
            ->describedBy("BALANCE ADJUSTMENT: {$event->account->name} -> {$event->account->balance->abs()} -> {$event->account->offsetAccount->name}.")
            ->andHavingSplits([
                // Credit this account
                ['type' => 'debit', 'account_id' => $event->account->id, 'amount' => $event->account->balance->abs()],
                // Debit the offset account
                ['type' => 'credit', 'account_id' => $event->account->offsetAccount->id, 'amount' => $event->account->balance->abs()],
            ]);
    }
}
