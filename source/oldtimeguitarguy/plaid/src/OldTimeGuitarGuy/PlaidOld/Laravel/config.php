<?php

return [
    
    /**
     * The host uri for plaid.
     * Development: https://tartan.plaid.com/
     * Prodctuion:  https://api.plaid.com/
     */
    'host' => env('PLAID_HOST', 'https://tartan.plaid.com/'),

    /**
     * The client id used to connect with plaid
     */
    'clientId' => env('PLAID_CLIENT_ID', 'test_id'),

    /**
     * The secret used to connect with plaid
     */
    'secret' => env('PLAID_SECRET', 'test_secret'),

];
