<?php

namespace App\Helpers;

trait CustomCollection
{
    /**
     * !! OVERRIDE ELOQUENT MODEL !!
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new $this->customCollectionType($models);
    }
}