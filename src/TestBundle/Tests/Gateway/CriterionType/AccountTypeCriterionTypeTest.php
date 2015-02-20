<?php

namespace TestBundle\Tests\Gateway\CriterionType;

use TestBundle\Gateway\CriterionType\AccountTypeCriterionType;
use TestBundle\Entity\AccountType;
use TestBundle\Entity\Contact;
use TestBundle\Entity\ContactOrder;
use TestBundle\Entity\ContactOrderType;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Member;
use TestBundle\Entity\Order;
use TestBundle\Entity\Transaction;
use TestBundle\Entity\User;

class AccountTypeCriterionTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var AccountTypeCriterionType */
    private $criterionType;
    /** @var  Transaction */
    private $transaction;
    /** @var AccountType */
    private $iboAccountType;
    /** @var GatewayCriterion */
    private $criterion;

    public function setUp()
    {
        parent::setUp();

        $this->criterionType = new AccountTypeCriterionType();

        $this->iboAccountType = new AccountType();
        $this->iboAccountType->setName(AccountType::IBO);

        $this->criterion = new GatewayCriterion();

        $member = new Member();
        $member->setType($this->iboAccountType);

        $user = new User();
        $user->addMember($member);

        $contact = new Contact();
        $contact->setUser($user);

        $contactOrderType = new ContactOrderType();
        $contactOrderType->setName(ContactOrderType::ORDER_FOR);

        $contactOrder = new ContactOrder();
        $contactOrder
            ->setContactOrderType($contactOrderType)
            ->setContact($contact);

        $order = new Order();
        $order->addContactOrder($contactOrder);

        $this->transaction = new Transaction();
        $this->transaction->addOrder($order);
    }

    /** @test */
    public function evaluate_true()
    {
        $this->criterion->setAccountType($this->iboAccountType);

        $this->assertTrue($this->criterionType->evaluate($this->criterion, $this->transaction));
    }

    /** @test */
    public function evaluate_false()
    {
        $pcAccountType = new AccountType();
        $pcAccountType->setName(AccountType::PC);

        $this->criterion->setAccountType($pcAccountType);

        $this->assertFalse($this->criterionType->evaluate($this->criterion, $this->transaction));
    }
}
