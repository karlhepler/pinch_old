<?php

namespace spec\Budget;

use Prophecy\Argument;
use Budget\TransactionList;
use PhpSpec\ObjectBehavior;

class BankSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Budget\Bank');
    }

    function it_has_a_transaction_list()
    {
        $this->transactions()->shouldReturnAnInstanceOf(TransactionList::class);
    }
}
