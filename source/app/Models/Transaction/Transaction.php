<?php

namespace App\Models\Transaction;

use App\Collections\Journal;
use App\Traits\CustomCollection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction\Traits\Relationships;

/**
 * A transaction is technicially just an exchange between two merchants.
 * The recordation of the transaction is called a "Journal Entry".
 * I chose to call this class Transaction out of familiarity and because
 * the front end will reference it as such. Also because we aren't really
 * doing exactly the same thing you would do in manual paper accounting.
 * We don't need to write separate journals and ledgers because the itemized lines
 * will relate to both at the same time.
 */
class Transaction extends Model
{
    use Relationships,
        CustomCollection;

    protected $customCollectionType = Journal::class;
}