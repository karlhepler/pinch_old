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
        $merchant = Merchant::find(1);
        $datetime = date();
        $description = 'My great trip to Kroger';

        $splits = new Splits;
        $splits->credit($account, $money);
        $splits->debit($account, $money);

        Transaction::record()
            ->with($merchant)
            ->on($datetime)
            ->describedBy($description)
            ->andHavingSplits($splits);
    }
}
