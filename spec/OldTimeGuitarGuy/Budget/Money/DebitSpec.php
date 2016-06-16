<?php

namespace spec\OldTimeGuitarGuy\Budget\Money\Money;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Money\Debit;
use OldTimeGuitarGuy\Budget\Money\Money;
use OldTimeGuitarGuy\Budget\Money\Credit;

class DebitSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1700);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Debit::class);
        $this->shouldBeAnInstanceOf(Money::class);
    }

    function it_can_add_itself_to_other_money(Debit $debit, Credit $credit, Credit $largeCredit)
    {
        // Set up the credit & debit amounts
        $debit->amount()->willReturn(-2500);
        $credit->amount()->willReturn(1300);
        $largeCredit->amount()->willReturn(10000);

        // Sum this with another debit: -17.00 + -25.00 = -42.00
        $result = $this->sum($debit);
        $result->shouldBeAnInstanceOf(Debit::class);
        $result->amount()->shouldBe(-4200);

        // Sum this with a credit: -17.00 + 13.00 = -4.00
        $result = $this->sum($credit);
        $result->shouldBeAnInstanceOf(Debit::class);
        $result->amount()->shouldBe(-400);

        // Sum this with a large credit: -17.00 + 100.00 = 83
        $result = $this->sum($largeCredit);
        $result->shouldBeAnInstanceOf(Credit::class);
        $result->amount()->shouldBe(8300);
    }
}
