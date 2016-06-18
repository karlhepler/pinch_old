<?php

namespace App\Models\Account\Traits;

use App\Models\Entry\Abstracts\Entry;

trait Relationships
{
    /**
     * Get this account's entries
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}