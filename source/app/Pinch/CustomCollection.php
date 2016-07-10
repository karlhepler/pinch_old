<?php

namespace App\Pinch;

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
        if ( isset($this->customCollectionType) ) {
            return new $this->customCollectionType($models);
        }

        return parent::newCollection($models);
    }
}