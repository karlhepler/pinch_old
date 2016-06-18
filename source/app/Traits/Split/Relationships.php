<?php

namespace App\Traits\Split;

use App\Money;
use App\Transaction;
use App\Accounts\Account;

trait Relationships
{
    /**
     * Get the money that belongs to this split
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function money()
    {
        return $this->hasOne(Money::class);
    }

    /**
     * Get the accounts this split belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accounts()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the transactions this split belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}