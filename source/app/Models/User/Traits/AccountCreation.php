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
        return $this->createAccount()->ofType('asset');
    }

    /**
     * Create a contra asset account
     *
     * @return \App\Factories\Accountant
     */
    public function openContraAssetAccount()
    {
        return $this->createAccount()->ofType('contra_asset');
    }

    /**
     * Create an equity account
     *
     * @return \App\Factories\Accountant
     */
    public function openEquityAccount()
    {
        return $this->createAccount()->ofType('equity');
    }

    /**
     * Create an expense account
     *
     * @return \App\Factories\Accountant
     */
    public function openExpenseAccount()
    {
        return $this->createAccount()->ofType('expense');
    }

    /**
     * Create an income account
     *
     * @return \App\Factories\Accountant
     */
    public function openIncomeAccount()
    {
        return $this->createAccount()->ofType('income');
    }

    /**
     * Create a liability account
     *
     * @return \App\Factories\Accountant
     */
    public function openLiabilityAccount()
    {
        return $this->createAccount()->ofType('liability');
    }
}