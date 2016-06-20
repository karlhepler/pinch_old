<?php

namespace App\Models\Transaction\Traits;

use App\Models\Merchant\Merchant;
use App\Models\Split\Base\Split;

trait Relationships
{
    /**
     * This transaction has many splits
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function splits()
    {
        return $this->hasMany(Split::class);
    }

    /**
     * This transaction belongs to a merchant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}