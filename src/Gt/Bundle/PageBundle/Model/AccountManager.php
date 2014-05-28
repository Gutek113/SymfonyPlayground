<?php

namespace Gt\Bundle\PageBundle\Model;

use Gt\Bundle\PageBundle\Entity\BankAccount;

class AccountManager
{

    /**
     *
     * @var BankAccount
     */
    protected $bankAccount = null;
    
    /**
     *
     * @var EntityManager
     */
    protected $em = null;

    /**
     * Method is responsible for deposit money into bank account. 
     * Method do not persist state of the object to the database.
     * 
     * @param float $money
     * @return float
     */
    public function deposit($money)
    {
        $this->bankAccount->setBalance($this->bankAccount->getBalance() + $money);
        return $this->bankAccount->getBalance();
    }

    /**
     * Method is responsible for money withdrawal. 
     * Method diminish bank account balance.
     * 
     * @param  float $money 
     * @return float        
     */
    public function withdraw($money)
    {

        $this->bankAccount->setBalance($this->bankAccount->getBalance() - $money);
        return $this->bankAccount->getBalance();   
    }

    public function setBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }
    
    
    public function setEm($em)
    {
        $this->em = $em;
        return $this;
    }

    
    public function create($accountNumber)
    {
        $bankAccount = new BankAccount();
        $bankAccount->setBalance(0.00);
        $bankAccount->setAccountNumber($accountNumber);
        $this->em->persist($bankAccount);
        $this->em->flush();
        $this->bankAccount = $bankAccount;
        
        return $this->bankAccount;
    }


    public function getBankAccount()
    {
        return $this->bankAccount;
    }
}
