<?php

use OldTimeGuitarGuy\Plaid\Contracts\PlaidClient;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlaidTest extends TestCase
{
    protected $plaid;
    protected $username = 'plaid_test';
    protected $password = 'plaid_bad';

    /**
     * @before
     */
    public function initialize()
    {
        $this->plaid = app(PlaidClient::class);
    }

    /**
     * @test
     */
    function it_can_authenticate_a_user()
    {
        $response = $this->plaid->authenticate('wells', $this->username, $this->password);

        dd( json_decode($response->getBody()->getContents()) );
    }
}
