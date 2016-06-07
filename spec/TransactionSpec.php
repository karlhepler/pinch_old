<?php

namespace spec\Budget;

use DateTime;
use Budget\Money;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class TransactionSpec extends ObjectBehavior
{
    function let(Money $money, DateTime $datetime)
    {
        $this->beConstructedWith($money, $datetime);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Budget\Transaction');
    }

    function it_can_get_the_money()
    {
        $this->money()->shouldReturnAnInstanceOf(Money::class);
    }

    function it_can_get_the_datetime_of_the_transaction()
    {
        $this->transactedAt()->shouldReturnAnInstanceOf(DateTime::class);
    }
}
