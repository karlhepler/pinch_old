<?php

namespace App\Models\Account\Traits;

use App\Models\Split\Base\Split;
use App\Models\Account\Base\Account;

trait Relationships
{
    /**
     * This account has many splits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function splits()
    {
        return $this->hasMany(Split::class);
    }

    /**
     * Get the offset account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offsetAccount()
    {
        return $this->belongsTo(Account::class);
    }
}