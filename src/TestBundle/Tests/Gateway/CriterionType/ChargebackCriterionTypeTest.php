<?php

namespace TestBundle\Tests\Gateway\CriterionType;

use TestBundle\Gateway\CriterionType\ChargebackCriterionType;
use TestBundle\Entity\Contact;
use TestBundle\Entity\ContactOrder;
use TestBundle\Entity\ContactOrderType;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Order;
use TestBundle\Entity\Transaction;
use TestBundle\Entity\TransactionType;

class ChargebackCriterionTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var ChargebackCriterionType */
    private $criterionType;
    /** @var Order */
    private $order;

    public function setUp()
    {
        parent::setUp();

        $this->criterionType = new ChargebackCriterionType();

        $contactOrderType = new ContactOrderType();
        $contactOrderType->setName(ContactOrderType::ORDER_FOR);

        $contactOrder = new ContactOrder();
        $contactOrder
            ->setContactOrderType($contactOrderType)
            ->setContact(new Contact());

        $this->order = new Order();
        $this->order->addContactOrder($contactOrder);
    }

    /** @test */
    public function evaluate_true()
    {
        $transactionType = new TransactionType();
        $transactionType->setName(TransactionType::SALE);

        $transaction = new Transaction();
        $transaction
            ->setTransactionType($transactionType)
            ->addOrder($this->order);

        $this->assertTrue($this->criterionType->evaluate(new GatewayCriterion(), $transaction));
    }

    /** @test */
    public function evaluate_false()
    {
        $transactionType = new TransactionType();
        $transactionType->setName(TransactionType::CHARGE_BACK);

        $transaction = new Transaction();
        $transaction
            ->setTransactionType($transactionType)
            ->addOrder($this->order);

        $this->assertFalse($this->criterionType->evaluate(new GatewayCriterion(), $transaction));
    }
}
