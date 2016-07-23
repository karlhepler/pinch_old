<?php

namespace OldTimeGuitarGuy\Plaid\Services;

class Connect extends Service
{
    /**
     * The base endpoint for all requests
     *
     * @var string
     */
    protected $endpoint = '/connect';

    /**
     * Add Connect user
     * 
     * https://plaid.com/docs/api/#add-connect-user
     *
     * @param  string $type     The institution code that you want to access.
     * @param  string $username Username associated with the user's financial institution.
     * @param  string $password Password associated with the user's financial institution.
     * @param  mixed  $pin      Pin number associated with the user's financial institution. (usaa only)
     * @param  array  $options
     * @return \OldTimeGuitarGuy\Plaid\Contracts\Http\Response
     */
    public function addUser($type, $username, $password, $pin = null, $options = [])
    {
        // Allow pin to optionally be set as options
        if ( is_array($pin) ) {
            $options = $pin;
            $pin = null;
        }

        return $this->request->post($this->endpoint, get_defined_vars());
    }

    /**
     * Connect MFA
     *
     * https://plaid.com/docs/api/#connect-mfa
     *
     * @param  string $mfa          The extra information needed in the format: {mfa:'xxxxx'}.
     * @param  string $access_token The ACCESS_TOKEN returned when the user was added.
     * @param  array  $options
     * @return \OldTimeGuitarGuy\Plaid\Contracts\Http\Response
     */
    public function mfa($mfa, $access_token, $options = [])
    {
        return $this->request->post("{$this->endpoint}/step", get_defined_vars());
    }

    /**
     * Get Transactions
     *
     * https://plaid.com/docs/api/#get-transactions
     *
     * @param  string $access_token The ACCESS_TOKEN returned when the user was added.
     * @param  array  $options
     * @return \OldTimeGuitarGuy\Plaid\Contracts\Http\Response
     */
    public function getTransactions($access_token, $options = [])
    {
        return $this->request->post("{$this->endpoint}/get", get_defined_vars());
    }

    /**
     * Update Connect User
     *
     * https://plaid.com/docs/api/#update-connect-user
     *
     * @param  string $username     Username associated with the user's financial institution.
     * @param  string $password     Password associated with the user's financial institution.
     * @param  string $access_token The ACCESS_TOKEN of the user you wish to update.
     * @param  mixed  $pin          Pin number associated with the user's financial institution. (usaa only)
     * @return \OldTimeGuitarGuy\Plaid\Contracts\Http\Response
     */
    public function updateUser($username, $password, $access_token, $pin = null)
    {
        return $this->request->patch($this->endpoint, get_defined_vars());
    }

    /**
     * Delete Connect User
     *
     * https://plaid.com/docs/api/#delete-connect-user
     *
     * @param  string $access_token The ACCESS_TOKEN that you wish to be removed from your account.
     * @return \OldTimeGuitarGuy\Plaid\Contracts\Http\Response
     */
    public function deleteUser($access_token)
    {
        return $this->request->delete($this->endpoint, compact('access_token'));
    }
}
