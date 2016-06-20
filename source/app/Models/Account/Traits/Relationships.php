<?php

namespace App\Models\Account\Traits;

use App\Models\Split\Base\Split;

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
}