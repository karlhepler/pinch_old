<?php

namespace App\Models\Account\Base\Traits;

use App\Models\User\User;
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
        return $this->hasMany(Split::class, 'account_id');
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

    /**
     * Get the parent account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentAccount()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the child accounts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childAccounts()
    {
        return $this->hasMany(Account::class, 'account_id');
    }

    /**
     * This account belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
