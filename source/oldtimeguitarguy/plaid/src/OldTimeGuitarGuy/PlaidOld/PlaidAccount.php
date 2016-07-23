<?php

namespace OldTimeGuitarGuy\Plaid;

/**
 * This is the class that is used to add a connect user
 * when calling Plaid@connect
 */
class PlaidAccount
{
    /**
     * The compiled account information
     *
     * @var array
     */
    protected $account = [];

    /**
     * Create a new instance of PlaidAccount
     *
     * @param string $type
     * @param string $username
     * @param string $password
     * @param string $pin
     */
    public function __construct($type, $username, $password, $pin = null)
    {
        $this->enforcePin($type, $pin);

        $this->account = [
            'type'     => $type,
            'username' => $username,
            'password' => $password,
            'pin'      => $pin,
        ];
    }

    /**
     * Add options json & return the whole array
     *
     * @param  array  $options
     * @return array
     */
    public function with(array $options)
    {
        return array_merge(
            $this->account,
            ['options' => json_encode($options)]
        );
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * If the given type requires a pin
     * and the pin is null, then throw an exception
     *
     * @param  string $type
     * @param  string $pin
     * @return void
     *
     * @throws Exceptions\PlaidException
     */
    protected function enforcePin($type, $pin)
    {
        if ( $this->requiresPin($type) && is_null($pin) ) {
            throw new Exceptions\PlaidException("{$type} requires a pin.");
        }
    }

    /**
     * Determine if the given type requires a pin
     *
     * @param  string $type
     * @return boolean
     */
    protected function requiresPin($type)
    {
        return $type === 'usaa';
    }
}
