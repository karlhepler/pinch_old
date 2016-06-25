<?php

namespace App\Models\User;

use App\Factories\Accountant;
use App\Factories\UserFactory;
use App\Models\User\Traits\Relationships;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Relationships;
    
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
     * Create a new account for this user
     *
     * @return \App\Factories\Accountant
     */
    public function createAccount()
    {
        return (new Accountant)->forUser($this);
    }

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
