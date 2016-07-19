<?php

use OldTimeGuitarGuy\Plaid\PlaidAccount;
use OldTimeGuitarGuy\Plaid\Contracts\PlaidClient;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlaidTest extends TestCase
{
    protected $plaid;
    protected $account;

    /**
     * @before
     */
    public function initialize()
    {
        $this->plaid = app(PlaidClient::class);

        $this->account = new \stdClass;
        $this->account->valid = new PlaidAccount('wells', 'plaid_test', 'plaid_good');
        $this->account->invalid = new PlaidAccount('wells', 'plaid_test', 'plaid_bad');
    }

    /**
     * @test
     */
    function it_can_authenticate_a_user()
    {
        $options = ['login_only' => true];
        $response = $this->plaid->connect($this->account->valid, $options);

        dd($response);
    }
}
