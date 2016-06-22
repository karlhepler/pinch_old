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
        $transaction = Transaction::record()
            ->on($this->faker()->date())
            ->with(factory(Merchant::class)->create()->id)
            ->describedBy($this->faker()->sentence)
            ->andHavingSplits([
                ['type' => $this->faker()->randomElement(array_keys(config('budget.split_types'))), 'amount' => $this->faker()->randomNumber, 'account_id' => factory(Account::class)->create()->id, 'memo' => $this->faker()->sentence],
                ['type' => $this->faker()->randomElement(array_keys(config('budget.split_types'))), 'amount' => $this->faker()->randomNumber, 'account_id' => factory(Account::class)->create()->id, 'memo' => $this->faker()->sentence],
                ['type' => $this->faker()->randomElement(array_keys(config('budget.split_types'))), 'amount' => $this->faker()->randomNumber, 'account_id' => factory(Account::class)->create()->id, 'memo' => $this->faker()->sentence],
                ['type' => $this->faker()->randomElement(array_keys(config('budget.split_types'))), 'amount' => $this->faker()->randomNumber, 'account_id' => factory(Account::class)->create()->id, 'memo' => $this->faker()->sentence],
            ]);
    }
}
