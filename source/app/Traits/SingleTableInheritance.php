<?php

namespace App\Traits;

trait SingleTableInheritance
{
    /**
     * !! OVERRIDE ELOQUENT MODEL !!
     * Create a new model instance that is existing.
     *
     * @param  array  $attributes
     * @param  string|null  $connection
     * @return static
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        // Create a new instance based on the type
        $model = new $this->inheritanceMap[$attributes['type']];
        $model->exists = true;

        $model->setRawAttributes((array) $attributes, true);

        $model->setConnection($connection ?: $this->connection);

        return $model;
    }
}