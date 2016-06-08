<?php

namespace spec\Budget;

use Budget\Money;
use Prophecy\Argument;
use Budget\Transaction;
use PhpSpec\ObjectBehavior;

class TransactionListSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Budget\TransactionList');
    }

    function it_can_return_the_number_of_transactions()
    {
        $this->count()->shouldBe(0);
    }

    function it_can_record_a_transaction(Transaction $transaction)
    {
        $this->record($transaction);
        $this->count()->shouldBe(1);
    }

    function it_can_return_the_sum_of_transactions(Transaction $t1, Money $m1, Transaction $t2, Money $m2)
    {
        $m1->rawAmount()->willReturn(300);
        $m2->rawAmount()->willReturn(200);
        $t1->money()->willReturn($m1);
        $t2->money()->willReturn($m2);

        $this->record($t1);
        $this->record($t2);

        $this->sum()->shouldReturnAnInstanceOf(Money::class);
        $this->sum()->rawAmount()->shouldReturn(500);
    }
}
