<?php

namespace App\Models\User\Traits;

use App\Factories\Accountant;

trait AccountCreation
{
    /**
     * Create a new account for this user
     *
     * @return \App\Factories\Accountant
     */
    public function openAccount()
    {
        return (new Accountant)->forUser($this);
    }

    /**
     * Create an asset account
     *
     * @return \App\Factories\Accountant
     */
    public function openAssetAccount()
    {
        return $this->openAccount()->ofType('asset');
    }

    /**
     * Create an equity account
     *
     * @return \App\Factories\Accountant
     */
    public function openEquityAccount()
    {
        return $this->openAccount()->ofType('equity');
    }

    /**
     * Create an expense account
     *
     * @return \App\Factories\Accountant
     */
    public function openExpenseAccount()
    {
        return $this->openAccount()->ofType('expense');
    }

    /**
     * Create an income account
     *
     * @return \App\Factories\Accountant
     */
    public function openIncomeAccount()
    {
        return $this->openAccount()->ofType('income');
    }

    /**
     * Create a liability account
     *
     * @return \App\Factories\Accountant
     */
    public function openLiabilityAccount()
    {
        return $this->openAccount()->ofType('liability');
    }
}
