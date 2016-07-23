<?php

namespace OldTimeGuitarGuy\Plaid\Contracts\Http;

interface Response
{
    /**
     * Get the json of the full response
     *
     * @return \stdClass
     */
    public function json();

    /**
     * The string representation of the response
     *
     * @return string
     */
    public function __toString();
}
