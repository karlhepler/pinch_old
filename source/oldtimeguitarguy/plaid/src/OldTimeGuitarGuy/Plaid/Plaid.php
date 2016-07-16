<?php

namespace OldTimeGuitarGuy\Plaid;

use GuzzleHttp\Client as GuzzleClient;

/**
 * This is the main entry point for Plaid.
 * Reference the contract for an easy method list.
 * 
 * https://plaid.com/docs/api
 */
class Plaid implements Contracts\PlaidClient
{
    /**
     * The guzzle client
     *
     * @var GuzzleClient
     */
    protected $http;

    /**
     * The client id used to connect with plaid
     *
     * @var string
     */
    protected $clientId;

    /**
     * The secret used to connect with plaid
     *
     * @var string
     */
    protected $secret;

    /**
     * Create a new instance of Plaid.
     * The instance expects that the guzzle client
     * already has a base_uri defined:
     * http://docs.guzzlephp.org/en/latest/quickstart.html
     *
     * @param GuzzleClient $http
     * @param string       $clientId
     * @param string       $secret
     */
    public function __construct(GuzzleClient $http, $clientId, $secret)
    {
        $this->http = $http;
        $this->clientId = $clientId;
        $this->secret = $secret;
    }

    /**
     * Authenticate a user & get its access token
     *
     * @param  string $username
     * @param  string $password
     * @return string
     */
    public function authenticate($username, $password)
    {
        return $this->request('connect', [
            'username' => $username,
            'password' => $password,
            'type' => 'wells',
            'options' => json_encode([
                'login_only' => true
            ])
        ]);
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Make a request to a Plaid endpoint,
     * passing in the given parameters.
     *
     * @param  string $endpoint
     * @param  array  $parameters
     * @return mixed
     */
    protected function request($endpoint, array $parameters)
    {
        return $this->http->post($endpoint, [
            'form_params' => array_merge(
                ['client_id' => $this->clientId, 'secret' => $this->secret],
                $parameters
            )
        ]);
    }
}
