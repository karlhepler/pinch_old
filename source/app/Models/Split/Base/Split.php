<?php

namespace App\Models\Split\Base;

use App\Collections\Splits;
use App\Factories\Splitter;
use App\Pinch\CustomCollection;
use OldTimeGuitarGuy\SingleTableInheritance\StiParent;

/**
 * A split is a single split of itemization of an account
 * in a transaction and in the account's ledger.
 * 
 * In the future, I might add an optional field for commodity,
 * which will allow the user to keep track of the specific thing
 * bought/sold on this split. This might allow the system to catch
 * wind of it, figure out if it is an asset, and recommend a
 * sinking fund for it.
 */
class Split extends StiParent
{
    use CustomCollection,
        Traits\Bootstrap,
        Traits\Relationships,
        Traits\AttributeMutators;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'splits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'amount', 'memo', 'account_id', 'transaction_id'
    ];

    /**
     * The fully-qualified classname
     * of the custom collection type
     * you would like to use for this model.
     *
     * @var string
     */
    protected $customCollectionType = Splits::class;

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Get an instance of the split based on
     * original data instead of attribute data
     *
     * @return \App\Models\Split\Base\Split
     */
    public function original()
    {
        return Splitter::newInstance($this->getOriginal());
    }

    //////////////////////////////
    // PROTECTED STATIC METHODS //
    //////////////////////////////

    /**
     * Get the single table inheritance children
     *
     * @return array
     */
    protected static function stiChildren()
    {
        return config('pinch.splitTypes');
    }
}
