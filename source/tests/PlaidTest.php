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
        $auResponse = $this->plaid->connect->addUser('usaa', 'plaid_test', 'plaid_good', 1234, $options);
        $mfaResponse = $this->plaid->connect->mfa($auResponse->access_token, 'tomato', $options);
        $gtResponse = $this->plaid->connect->getTransactions($mfaResponse->access_token);
        $usResponse = $this->plaid->connect->updateUser($gtResponse->access_token, 'plaid_test', 'plaid_good', 1234);
        $mfa2Response = $this->plaid->connect->mfa($auResponse->access_token, 'tomato', $options);
        $duResponse = \Plaid::connect()->deleteUser($mfa2Response->access_token);
        dd($duResponse);
    }
}
