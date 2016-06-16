<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Book;
use OldTimeGuitarGuy\Budget\Split;
use OldTimeGuitarGuy\Budget\Splits;
use OldTimeGuitarGuy\Budget\Money\Debit;
use OldTimeGuitarGuy\Budget\Transaction;
use OldTimeGuitarGuy\Budget\Money\Credit;

class TransactionSpec extends ObjectBehavior
{
    protected $credit;

    function let(\DateTime $datetime, Splits $splits, Credit $credit)
    {
        $this->credit = $credit;

        $splits->balance()->willReturn($this->credit);
        $this->beConstructedWith($datetime, $splits);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Transaction::class);
    }

    function it_has_a_book_of_splits()
    {
        $this->splits()->shouldBeAnInstanceOf(Splits::class);
    }

    function it_can_determine_if_it_is_valid()
    {
        // It's invalid if the returned balance is not 0
        $this->credit->amount()->willReturn(1);
        $this->shouldNotBeValid();

        // It should be valid by setting it to 0
        $this->credit->amount()->willReturn(0);
        $this->shouldBeValid();
    }
}
