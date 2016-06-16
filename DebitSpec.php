<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Money\Debit;
use OldTimeGuitarGuy\Budget\Money\Money;
use OldTimeGuitarGuy\Budget\Money\Credit;

class DebitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Debit::class);
        $this->shouldBeAnInstanceOf(Money::class);
    }
}
