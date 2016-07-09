<?php

namespace App\Models\User;

use App\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Traits\Relationships,
        Traits\AccountCreation;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Register a new user
     *
     * @param  array  $attributes
     * @return \App\Models\User\User
     */
    public static function register(array $attributes)
    {
        return UserFactory::create($attributes);
    }
}
