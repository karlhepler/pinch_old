<?php

namespace spec\OldTimeGuitarGuy\Budget;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoneySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('OldTimeGuitarGuy\Budget\Money');
    }

    function it_has_a_value()
    {
        $this->value()->shouldBeInteger();
    }

    function it_has_a_currency_that_defaults_to_USD()
    {
        $this->currency()->shouldBe('USD');
    }
}
