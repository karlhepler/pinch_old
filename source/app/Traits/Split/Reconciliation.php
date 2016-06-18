<?php

namespace App\Traits\Split;

use Carbon\Carbon;

trait Reconcilition
{
    /**
     * Determine if this split is reconciled
     *
     * @return boolean
     */
    public function isReconciled()
    {
        return !is_null($this->reconciled_at);
    }

    /**
     * Reconcile this split
     *
     * @return boolean|integer
     */
    public function reconcile()
    {
        return $this->update([
            'reconciled_at' => Carbon::now()
        ]);
    }

    /**
     * Unreconcile this split
     *
     * @return boolean|integer
     */
    public function unreconcile()
    {
        return $this->update([
            'reconciled_at' => null
        ]);
    }
}