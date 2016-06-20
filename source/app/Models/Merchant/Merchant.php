<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant\Traits\Relationships;

/**
 * While inconsequential to the accounting of a transaction,
 * the merchant is the other party with whom the user (also a merchant),
 * is transacting. It can be useful to keep track of merchants for many reasons.
 */
class Merchant extends Model
{
    use Relationships;

    protected $fillable = ['name'];
}