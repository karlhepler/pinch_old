<?php

namespace OldTimeGuitarGuy\Plaid\Http;

use Psr\Http\Message\ResponseInterface;
use OldTimeGuitarGuy\Plaid\Contracts\Http\Response as ResponseContract;

class Response implements ResponseContract
{
    /**
     * Create a new instance of Plaid Response
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        // @todo
    }
}
