<?php

use Carbon\Carbon;
use App\Models\Merchant\Merchant;
use App\Models\Account\Base\Account;
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
        // Create two accounts
        $bank = factory(\App\Models\Account\Asset::class)->create(['name' => 'BANK']);
        $expense = factory(\App\Models\Account\Expense::class)->create(['name' => 'EXPENSE']);
        $income = factory(\App\Models\Account\Income::class)->create(['name' => 'INCOME']);

        $incomeAmount = $this->faker()->numberBetween(1, 10000);
        $expenseAmount = $this->faker()->numberBetween(1, 10000);

        // Record some income
        $transaction = Transaction::record()
            ->on($this->faker()->date())
            ->with(factory(Merchant::class)->create()->id)
            ->describedBy($this->faker()->sentence)
            ->andHavingSplits([
                ['type' => 'credit', 'amount' => $incomeAmount, 'account_id' => $income->id, 'memo' => $this->faker()->sentence],
                ['type' => 'debit', 'amount' => $incomeAmount, 'account_id' => $bank->id, 'memo' => $this->faker()->sentence],
            ]);

        // Record an expense
        $transaction = Transaction::record()
            ->on($this->faker()->date())
            ->with(factory(Merchant::class)->create()->id)
            ->describedBy($this->faker()->sentence)
            ->andHavingSplits([
                ['type' => 'credit', 'amount' => $expenseAmount, 'account_id' => $bank->id, 'memo' => $this->faker()->sentence],
                ['type' => 'debit', 'amount' => $expenseAmount, 'account_id' => $expense->id, 'memo' => $this->faker()->sentence],
            ]);

        $this->assertEquals($incomeAmount - $expenseAmount, $bank->normal_balance->value());
        $this->assertEquals($incomeAmount, $income->normal_balance->value());
        $this->assertEquals($expenseAmount, $expense->normal_balance->value());
    }
}
