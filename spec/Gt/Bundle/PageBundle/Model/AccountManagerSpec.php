<?php

namespace spec\Gt\Bundle\PageBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Gt\Bundle\PageBundle\Entity\BankAccount;
use Gt\Bundle\PageBundle\Entity\BankAccountRepository;
use Doctrine\ORM\EntityManager;

class AccountManagerSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Gt\Bundle\PageBundle\Model\AccountManager');
    }

    function it_deposit_money_to_account()
    {
        $bankAccount = new BankAccount();
        $bankAccount->setBalance(100.00);
        $this->setBankAccount($bankAccount);
        $this->deposit(100.00)->shouldReturn(200.00);
    }

    function it_withdraw_money_from_account()
    {
        $bankAccount = new BankAccount();
        $bankAccount->setBalance(300.00);
        $this->setBankAccount($bankAccount);
        $this->withdraw(100.00)->shouldReturn(200.00);
    }

    function it_should_has_bank_account_entity(BankAccount $bankAccount)
    {
        $this->setBankAccount($bankAccount);
        $this->getBankAccount()->shouldHaveType('Gt\Bundle\PageBundle\Entity\BankAccount');
    }
    
    function it_should_create_bank_account(EntityManager $entityManager)
    {        
        $this->setEm($entityManager);
        $test = $this->create(234)->shouldHaveType('Gt\Bundle\PageBundle\Entity\BankAccount');
        
    }

}
