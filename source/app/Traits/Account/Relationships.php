<?php

namespace App\Traits\Account;

use App\Splits\Split;

trait Relationships
{
    /**
     * Get this account's splits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function splits()
    {
        return $this->hasMany(Split::class);
    }
}