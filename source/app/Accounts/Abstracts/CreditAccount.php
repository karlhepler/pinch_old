<?php

namespace App\Accounts\Abstracts;

abstract class CreditAccount extends Account
{
    public function credit()
    {
        // Increase the balance
    }

    public function debit()
    {
        // Decrease the balance
    }
}