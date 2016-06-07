<?php

namespace spec\Budget;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoneySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(4275);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Budget\Money');
    }

    function it_can_return_dollars()
    {
        $this->dollars()->shouldReturn(42);
    }

    function it_can_return_cents()
    {
        $this->cents()->shouldReturn(75);
    }

    function it_can_return_a_formatted_string()
    {
        $this->__toString()->shouldReturn('42.75');
    }

    function it_can_return_a_float_amount()
    {
        $this->amount()->shouldReturn(42.75);
    }

    function it_can_return_the_raw_amount()
    {
        $this->rawAmount()->shouldReturn(4275);
    }
}
