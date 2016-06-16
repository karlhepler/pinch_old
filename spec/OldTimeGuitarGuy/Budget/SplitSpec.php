<?php

namespace spec\OldTimeGuitarGuy\Budget;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use OldTimeGuitarGuy\Budget\Money;
use OldTimeGuitarGuy\Budget\Split;
use OldTimeGuitarGuy\Budget\Account;
use OldTimeGuitarGuy\Budget\Transaction;

class SplitSpec extends ObjectBehavior
{
    function let(Money $money, Transaction $transaction, Account $account)
    {
        $this->beConstructedWith($money, $transaction, $account);
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
}
