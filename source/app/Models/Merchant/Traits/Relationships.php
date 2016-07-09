<?php

namespace App\Models\Merchant\Traits;

use App\Models\Transaction\Transaction;

trait Relationships
{
    /**
     * This merchant has many transactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
