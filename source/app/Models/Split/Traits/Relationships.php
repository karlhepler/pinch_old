<?php

namespace App\Models\Split\Traits;

use App\Models\Transaction\Transaction;
use App\Models\Account\Abstracts\Account;

trait Relationships
{
    /**
     * This split belongs to an account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * This split belongs to a transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}