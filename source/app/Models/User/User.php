<?php

namespace App\Models\User;

use App\Factories\Accountant;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
}
