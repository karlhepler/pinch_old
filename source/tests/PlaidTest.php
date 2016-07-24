<?php

use OldTimeGuitarGuy\Plaid\Plaid;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlaidTest extends TestCase
{
    protected $plaid;

    /**
     * @before
     */
    public function initialize()
    {
        $this->plaid = app(Plaid::class);
    }

    /**
     * @test
     */
    function it_can_authenticate_a_user()
    {
        $options = ['login_only' => true];
        $response = $this->plaid->connect->addUser('wells', 'plaid_test', 'plaid_good', $options);

        dd($response);
    }
}
