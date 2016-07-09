<?php

namespace App\Models\User\Traits;

use App\Models\Account\Base\Account;

trait Relationships
{
    /**
     * This user has many accounts
     *
     * @return \App\Models\Account\Base\Account
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
