<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Split;
use OldTimeGuitarGuy\Budget\Account;
use OldTimeGuitarGuy\Budget\Transaction;
use OldTimeGuitarGuy\Budget\Money\Money;

class SplitSpec extends ObjectBehavior
{
    function let(Money $money, Transaction $transaction, Account $account)
    {
        $this->beConstructedWith($money, $transaction, $account, 'This is a great memo.');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Split::class);
    }

    function it_has_an_amount_of_money()
    {
        $this->money()->shouldBeAnInstanceOf(Money::class);
    }

    function it_points_to_a_single_transaction()
    {
        $this->transaction()->shouldBeAnInstanceOf(Transaction::class);
    }

    function it_points_to_a_single_account()
    {
        $this->account()->shouldBeAnInstanceOf(Account::class);
    }

    function it_has_a_memo()
    {
        $this->memo()->shouldReturn('This is a great memo.');
    }

    function it_can_reconcile()
    {
        $this->isReconciled()->shouldBe(false);
        $this->reconcile()->shouldBe(true);
        $this->isReconciled()->shouldBe(true);
        $this->unreconcile()->shouldBe(false);
        $this->isReconciled()->shouldBe(false);
    }
}
