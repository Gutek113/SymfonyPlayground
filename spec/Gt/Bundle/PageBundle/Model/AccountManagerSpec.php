<?php

namespace spec\Gt\Bundle\PageBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountManagerSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Gt\Bundle\PageBundle\Model\AccountManager');
    }

    function it_deposit_money_to_account()
    {
        $this->deposit();
    }
    
    function it_withdraw_money_from_account()
    {
        $this->withdraw();
    }
    

}
