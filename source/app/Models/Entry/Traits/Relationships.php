<?php

namespace App\Models\Entry\Traits;

use App\Models\Transaction\Transaction;
use App\Models\Account\Abstracts\Account;

trait Relationships
{
    /**
     * Get the accounts this entry belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accounts()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the transactions this Entry belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}