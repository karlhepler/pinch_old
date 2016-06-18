<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Money;
use OldTimeGuitarGuy\Budget\Transaction;
use OldTimeGuitarGuy\Budget\Reconcilition;
use OldTimeGuitarGuy\Budget\Accounts\Account;

class SplitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('OldTimeGuitarGuy\Budget\Split');
    }

    function it_has_money()
    {
        $this->money()->shouldBeAnInstanceOf(Money::class);
    }

    function it_has_a_single_account()
    {
        $this->account()->shouldBeAnInstanceOf(Account::class);
    }

    function it_has_a_single_transaction()
    {
        $this->transaction()->shouldBeAnInstanceOf(Transaction::class);
    }

    function it_has_a_memo()
    {
        $this->memo()->shouldBeAString();
    }

    function it_can_reconcile()
    {
        $this->reconciliation()->shouldBeAnInstanceOf(Reconcilition::class);
    }
}
