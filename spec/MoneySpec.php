<?php

namespace spec\Budget;

use Budget\Money;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

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

    function it_can_add_money_and_return_a_new_instance(Money $money)
    {
        $money->rawAmount()->willReturn(1000);

        // Make sure an instance of Money is returned
        $this->add($money)->shouldReturnAnInstanceOf(Money::class);

        // Make sure the returned money value is 5275
        $this->add($money)->rawAmount()->shouldBe(5275);

        // Make sure this value hasn't changed
        $this->rawAmount()->shouldBe(4275);
    }
}
