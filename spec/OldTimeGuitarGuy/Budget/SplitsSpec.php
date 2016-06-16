<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Book;
use OldTimeGuitarGuy\Budget\Split;
use OldTimeGuitarGuy\Budget\Splits;
use OldTimeGuitarGuy\Budget\Account;
use OldTimeGuitarGuy\Budget\Money\Debit;
use OldTimeGuitarGuy\Budget\Money\Money;
use OldTimeGuitarGuy\Budget\Transaction;
use OldTimeGuitarGuy\Budget\Money\Credit;

class SplitsSpec extends ObjectBehavior
{
    function let(Credit $credit, Debit $debit, Split $s1, Split $s2)
    {
        $credit->amount()->willReturn(10000);
        $debit->amount()->willReturn(-5000);
        $s1->money()->willReturn($credit);
        $s2->money()->willReturn($debit);

        $this->beConstructedWith([$s1, $s2]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Splits::class);
        $this->shouldBeAnInstanceOf(Book::class);
    }

    function it_can_calculate_the_balance_of_its_money()
    {
        $result = $this->balance();
        $result->shouldBeAnInstanceOf(Money::class);
        $result->amount()->shouldBe(5000);
    }
}
