<?php

namespace spec\OldTimeGuitarGuy\Budget;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LedgerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('OldTimeGuitarGuy\Budget\Ledger');
    }
}
