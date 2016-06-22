<?php

namespace App\Helpers;

use ReflectionClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class SingleTableInheritanceParent extends Model
{
    /**
     * Get the single table inheritance class map
     *
     * @return array
     */
    abstract protected function singleTableInheritanceClassMap();

    /**
     * !! OVERRIDE ELOQUENT MODEL !!
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        // Set the type to the given type
        // or to the snake_case version of the short class name
        $attributes['type'] = array_get(
            $attributes, 'type', snake_case((new ReflectionClass($this))->getShortName())
        );

        parent::__construct($attributes);
    }

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
        $class = $this->singleTableInheritanceClassMap()[$attributes->type];
        $model = new $class;
        $model->exists = true;

        $model->setRawAttributes((array) $attributes, true);

        $model->setConnection($connection ?: $this->connection);

        return $model;
    }

    /**
     * The "booting" method of the model
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        $instance = new static;

        if (! isset(array_flip($instance->singleTableInheritanceClassMap())[static::class]) ) {
            return;
        }

        static::addGlobalScope('type', function (Builder $builder) use ($instance) {
            $builder->where('type', snake_case((new ReflectionClass($instance))->getShortName()));
        });
    }
}
