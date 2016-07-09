<?php

namespace App\Helpers;

trait CustomCollection
{
    /**
     * The fully-qualified classname
     * of the custom collection type
     * you would like to use for this model.
     *
     * @var string
     */
    protected $customCollectionType;

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