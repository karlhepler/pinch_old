<?php

namespace OldTimeGuitarGuy\Plaid\Contracts;

interface PlaidUser
{
    /**
     * Get this plaid user's access token
     *
     * @return string
     */
    public function accessToken();
}
