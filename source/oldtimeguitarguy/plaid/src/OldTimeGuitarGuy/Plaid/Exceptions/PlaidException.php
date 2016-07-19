<?php

namespace OldTimeGuitarGuy\Plaid\Exceptions;

use OldTimeGuitarGuy\Plaid\Contracts\PlaidErrors;

class PlaidException extends \Exception implements PlaidErrors
{
    /**
     * The original Plaid error
     *
     * @var \stdClass
     */
    protected $error;

    /**
     * Create a new instance of PlaidException
     *
     * @param \stdClass $error
     */
    public function __construct(\stdClass $error)
    {
        $this->error = $error;

        parent::__construct($error->resolve);
    }

    /**
     * Create a new instance of PlaidException.
     * Depending on the type of error thrown,
     * we might call PlaidClientException instead
     *
     * @param  \stdClass $error
     * @return \OldTimeGuitarGuy\Plaid\Exceptions\PlaidException
     */
    public static function newInstance(\stdClass $error)
    {
        if ( static::isClientError($error) ) {
            return new PlaidClientException($error);
        }

        return new self($error);
    }

    /**
     * Get the original plaid error
     *
     * @return \stdClass
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * Determine if this is a client error
     *
     * @param  \stdClass $error
     * @return boolean
     */
    protected static function isClientError(\stdClass $error)
    {
        return in_array($error->code, [
            static::INVALID_CREDENTIALS,
            static::INVALID_USERNAME,
            static::INVALID_PASSWORD,
            static::INVALID_MFA,
            static::ACCOUNT_LOCKED,
            static::ACCOUNT_NOT_SETUP,
            static::COUNTRY_NOT_SUPPORTED,
            static::MFA_NOT_SUPPORTED,
            static::INVALID_PIN,
            static::ACCOUNT_NOT_SUPPORTED,
            static::BOFA_ACCOUNT_NOT_SUPPORTED,
            static::NO_ACCOUNTS,
            static::MFA_RESET,
            static::MFA_NOT_REQUIRED,
            static::INSTITUTION_NOT_AVAILABLE,
            static::INSTITUTION_NOT_RESPONDING,
            static::INSTITUTION_DOWN,
            static::INSTITUTION_NO_LONGER_SUPPORTED,
            static::USER_NOT_FOUND,
            static::ITEM_NOT_FOUND,
            static::EXTRACTOR_ERROR,
        ]);
    }
}
