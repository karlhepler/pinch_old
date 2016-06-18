<?php

namespace App\Splits;

use App\Traits\Split\Reconcilition;
use App\Traits\Split\Relationships;
use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;

abstract class Split extends Model
{
    use Relationships, Reconcilition, SingleTableInheritance;

    protected $table = 'splits';
    protected $dates = ['reconciled_at'];
    protected $inheritanceMap = [
        'credit' => Credit::class,
        'debit'  => Debit::class,
    ];
}
