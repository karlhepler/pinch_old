<?php

namespace App\Models\Transaction;

use App\Factories\Splitter;
use App\Collections\Journal;
use App\Pinch\CustomCollection;
use App\Factories\TransactionRecord;
use Illuminate\Database\Eloquent\Model;

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
    use CustomCollection,
        Traits\Relationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transacted_at', 'merchant_id', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'transacted_at'
    ];

    /**
     * The fully-qualified classname
     * of the custom collection type
     * you would like to use for this model.
     *
     * @var string
     */
    protected $customCollectionType = Journal::class;

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Record a new transaction in the journal & ledger
     *
     * @return \App\Factories\TransactionRecord
     */
    public static function record()
    {
        return new TransactionRecord;
    }

    /**
     * Add splits to the transaction
     *
     * @param  array $splits
     * @return void
     */
    public function addSplits(array $splits)
    {
        array_map([$this, 'addSplit'], $splits);
    }

    /**
     * Add a split to the transaction
     *
     * @param  array $split
     * @return void
     */
    public function addSplit(array $split)
    {
        $this->splits()->save(Splitter::newInstance($split));
    }
}
