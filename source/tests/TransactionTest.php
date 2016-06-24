<?php

use Carbon\Carbon;
use App\Factories\Accountant;
use App\Models\Transaction\Transaction;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    function it_can_record_a_new_transaction()
    {
        // $bank = Accountant::create([
        //     'type' => 'asset',
        //     'name' => 'Bank of America',
        // ]);

        // $income = Accountant::create([
        //     'type' => 'income',
        //     'name' => 'My Income',
        // ]);

        // $expense = Accountant::create([
        //     'type' => 'expense',
        //     'name' => 'Groceries',
        // ]);

        // // Record $100 income into the bank
        // Transaction::record()
        //     ->on(Carbon::now())
        //     ->describedBy('$100 bank deposit')
        //     ->andHavingSplits([
        //         // Debit the bank
        //         ['type' => 'debit', 'account_id' => $bank->id, 'amount' => 100],
        //         // Credit income
        //         ['type' => 'credit', 'account_id' => $income->id, 'amount' => 100],
        //     ]);

        // // Record $150 spent at store
        // Transaction::record()
        //     ->on(Carbon::now())
        //     ->describedBy('$150 spent on groceries')
        //     ->andHavingSplits([
        //         // Debit the expense account
        //         ['type' => 'debit', 'account_id' => $expense->id, 'amount' => 150],
        //         // Credit the bank account
        //         ['type' => 'credit', 'account_id' => $bank->id, 'amount' => 150],
        //     ]);

        // dd( \App\Models\Account\Base\Account::all() );

        // When creating a new user account,
        // we need to create
        // * Equity:Opening Balances
        // * Assets:Current Assets
        // * Assets:Accounts Receiveable
        // * Liabilities:Credit Card
        // * Liabilities:Accounts Payable

        // Create a user
        $user = factory(User::class)->create();

        // Create the user's initial parent accounts
        $user->createAccount()->ofType('asset')->named('Current Assets')->andWithOpeningBalance(0);
        $account->createChildAccount()->named('Something Else')->andWithOpeningBalance(100);
        $account->createSiblingAccount()->named('Sibling')->andWithOpeningBalance(123);
    }
}
