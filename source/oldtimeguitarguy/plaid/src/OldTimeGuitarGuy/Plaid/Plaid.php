<?php

namespace OldTimeGuitarGuy\Plaid;

use GuzzleHttp\Client as GuzzleClient;

/**
 * https://plaid.com/docs/api
 */
class Plaid
{
    /**
     * The guzzle client
     *
     * @var GuzzleClient
     */
    protected $http;

    /**
     * Create a new instance of Plaid.
     * The instance expects that the guzzle client
     * already has a base_uri defined:
     * http://docs.guzzlephp.org/en/latest/quickstart.html
     *
     * @param GuzzleClient $http
     * @param @todo: Should I make an object?
     */
    public function __construct(GuzzleClient $http, $config)
    {
        $this->http = $http;
    }
}
