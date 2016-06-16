<?php

namespace spec\OldTimeGuitarGuy\Budget\Money;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Money\Debit;
use OldTimeGuitarGuy\Budget\Money\Money;
use OldTimeGuitarGuy\Budget\Money\Credit;

class CreditSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1700);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Credit::class);
        $this->shouldBeAnInstanceOf(Money::class);
    }

    function it_can_add_itself_to_other_money(Credit $credit, Debit $debit, Debit $largeDebit)
    {
        // Set up the credit & debit amounts
        $credit->amount()->willReturn(2500);
        $debit->amount()->willReturn(-1300);
        $largeDebit->amount()->willReturn(-10000);

        // Sum this with another credit: 17.00 + 25.00 = 42.00
        $result = $this->sum($credit);
        $result->shouldBeAnInstanceOf(Credit::class);
        $result->amount()->shouldBe(4200);

        // Sum this with a debit: 17.00 + -13.00 = 4.00
        $result = $this->sum($debit);
        $result->shouldBeAnInstanceOf(Credit::class);
        $result->amount()->shouldBe(400);

        // Sum this with a large debit: 17.00 + -100.00 = -83.00
        $result = $this->sum($largeDebit);
        $result->shouldBeAnInstanceOf(Debit::class);
        $result->amount()->shouldBe(-8300);
    }
}
