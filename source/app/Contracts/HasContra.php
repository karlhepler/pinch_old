<?php

namespace App\Contracts;

interface HasContra
{
    /**
     * Get a copy of this,
     * instantiated by its contra class
     *
     * @return mixed
     */
    public function contra();
}