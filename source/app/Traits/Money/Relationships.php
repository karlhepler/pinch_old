<?php

namespace App\Traits\Money;

trait Relationships
{
    /**
     * Get the split that this money belongs to
     *
     * @return \App\Split
     */
    public function split()
    {
        return $this->belongsTo(Split::class);
    }
}