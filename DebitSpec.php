<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Debit;
use OldTimeGuitarGuy\Budget\Money;
use OldTimeGuitarGuy\Budget\Credit;

class DebitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Debit::class);
        $this->shouldBeAnInstanceOf(Money::class);
    }
}
