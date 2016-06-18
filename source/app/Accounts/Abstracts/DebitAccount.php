<?php

namespace App\Accounts\Abstracts;

abstract class DebitAccount extends Account
{
    public function credit()
    {
        // Decrease the balance
    }

    public function debit()
    {
        // Increase the balance
    }
}