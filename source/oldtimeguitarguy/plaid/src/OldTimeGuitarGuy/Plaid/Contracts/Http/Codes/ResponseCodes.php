<?php

namespace OldTimeGuitarGuy\Plaid\Contracts\Http\Codes;

interface ResponseCodes
{
    const SUCCESS         = 200;
    const MFA_REQUIRED    = 201;
    const BAD_REQUEST     = 400;
    const UNAUTHORIZED    = 401;
    const REQUEST_FAILED  = 402;
    const CANNOT_BE_FOUND = 404;
    const SERVER_ERROR    = 500;
}
