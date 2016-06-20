<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionTest extends TestCase
{
    /**
     * @test
     */
    function it_can_record_a_new_transaction()
    {
        Transaction::record($description)
            ->with($merchant)
            ->on($datetime)
            ->havingCredits($credits)
            ->andHavingDebits($debits);
    }
}
