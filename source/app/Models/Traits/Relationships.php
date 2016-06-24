<?php

namespace App\Models\Traits;

use App\Models\Account\Base\Account;

trait Relationships
{
    /**
     * The use has many accounts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}