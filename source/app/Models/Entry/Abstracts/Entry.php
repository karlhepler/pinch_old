<?php

namespace App\Models\Entry\Abstracts;

use App\Money;
use App\Models\Entry\Debit;
use App\Collections\Entries;
use App\Models\Entry\Credit;
use App\Traits\CustomCollection;
use App\Traits\SingleTableInheritance;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entry\Traits\Relationships;

abstract class Entry extends Model
{
    use Attributes,
        Relationships,
        CustomCollection,
        SingleTableInheritance;

    protected $table = 'entries';
    protected $fillable = ['type', 'amount'];
    protected $customCollectionType = Entries::class;
    protected $inheritanceMap = [
        'credit' => Credit::class,
        'debit'  => Debit::class,
    ];
}
