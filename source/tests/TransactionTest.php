<?php

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
        // What do we receive?
        /*
            merchant id/name - optional
            merchant = [
                id?
                name?
            ]
            transaction date - YYYY-MM-DD
            description - optional
            splits = [
                {
                    type: 'credit|debit',
                    account_id: integer,
                    amount: integer,
                    memo: string
                }
            ]
        */

        if ( $request->has('merchant.id') ) {
            // use it
        }
        elseif ( $request->has('merchant.name') ) {
            Merchant::firstOrCreate(['name' => $request->merchant['name']]);
        }
        else {
            // do nothing
        }

        $transactedAt = Carbon::createFromFormat($request->transactedAt, 'Y-m-d');
        $description = $request->description;

        $splits = new Splits;
        $splits->credit($account, $money, $memo);
        $splits->debit($account, $money, $memo);

        Transaction::record()
            ->with($merchant)
            ->on($datetime)
            ->describedBy($description)
            ->andHavingSplits($splits);
    }
}
