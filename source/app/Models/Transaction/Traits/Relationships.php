<?php

namespace App\Models\Transaction\Traits;

use App\Models\Entry\Abstracts\Entry;

trait Relationships
{
    /**
     * Get this transaction's entries
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}