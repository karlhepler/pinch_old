<?php

namespace spec\Budget;

use Budget\Money;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class MoneyListSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Budget\MoneyList');
    }

    function it_can_return_the_number_of_monies()
    {
        $this->count()->shouldBe(0);
    }

    function it_can_pocket_money(Money $money)
    {
        $this->pocket($money);
        $this->count()->shouldBe(1);
    }

    function it_can_return_the_balance_of_monies(Money $m1, Money $m2)
    {
        $m1->rawAmount()->willReturn(300);
        $m2->rawAmount()->willReturn(200);

        $this->pocket($m1);
        $this->pocket($m2);

        $this->balance()->shouldReturnAnInstanceOf(Money::class);
        $this->balance()->rawAmount()->shouldReturn(500);
    }
}
