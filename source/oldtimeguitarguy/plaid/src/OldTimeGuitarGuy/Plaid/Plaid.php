<?php

namespace OldTimeGuitarGuy\Plaid;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;
use OldTimeGuitarGuy\Plaid\Exceptions\PlaidException;
use OldTimeGuitarGuy\Plaid\Exceptions\MfaRequiredException;

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

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Authenticate an account
     *
     * @param  \OldTimeGuitarGuy\Plaid\PlaidAccount $account
     * @param  array $options
     * @return \stdClass
     */
    public function addUser(PlaidAccount $account, array $options = [])
    {
        $response = $this->request('connect', $account->with($options));

        return $this->decode($response);
    }

    /**
     * Submit mfa information
     *
     * @param  \OldTimeGuitarGuy\Plaid\Contracts\PlaidUser $user
     * @param  string    $mfa
     * @param  array     $options
     * @return \stdClass
     */
    public function mfa(PlaidUser $user, $mfa, array $options = [])
    {
        $response = $this->request('connect/step', [
            'access_token' => $user->accessToken(),
            'mfa' => $mfa,
            'options' => json_encode($options),
        ]);

        return $this->decode($response);
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
     * @return \GuzzleHttp\Psr7\Response
     *
     * @throws \OldTimeGuitarGuy\Plaid\Exceptions\PlaidException
     * @throws \GuzzleHttp\Exception\TransferException
     */
    protected function request($endpoint, array $parameters)
    {
        try {
            $response = $this->http->post($endpoint, [
                'form_params' => array_merge(
                    ['client_id' => $this->clientId, 'secret' => $this->secret],
                    $parameters
                )
            ]);

            $this->checkMfaRequired($response);

            return $response;
        }
        catch (BadResponseException $e) {
            throw PlaidException::newInstance(
                json_decode($e->getResponse()->getBody()->getContents())
            );
        }
    }

    /**
     * Check to see if MFA is required.
     * If it is, throw MfaRequiredException
     *
     * @param  \GuzzleHttp\Psr7\Response $response
     * @return void
     *
     * @throws \OldTimeGuitarGuy\Plaid\Exceptions\MfaRequiredException
     */
    protected function checkMfaRequired(Response $response)
    {
        if ( $response->getStatusCode() === PlaidErrors::MFA_REQUIRED ) {
            throw new MfaRequiredException($this->decode($response));
        }
    }

    /**
     * Decode the response to json
     *
     * @param  \GuzzleHttp\Psr7\Response $response
     * @return \stdClass
     */
    protected function decode(Response $response)
    {
        return json_decode($response->getBody()->getContents());
    }
}
