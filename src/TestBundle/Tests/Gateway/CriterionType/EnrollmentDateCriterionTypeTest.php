<?php

namespace TestBundle\Tests\Gateway\CriterionType;

use TestBundle\Gateway\CriterionType\EnrollmentDateCriterionType;
use TestBundle\Entity\Contact;
use TestBundle\Entity\ContactOrder;
use TestBundle\Entity\ContactOrderType;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\GatewayCriterionOperator;
use TestBundle\Entity\GatewayCriterionValue;
use TestBundle\Entity\Member;
use TestBundle\Entity\OperatorType;
use TestBundle\Entity\Order;
use TestBundle\Entity\Transaction;
use TestBundle\Entity\User;
use TestBundle\Service\MathService;

class EnrollmentDateCriterionTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var EnrollmentDateCriterionType */
    private $criterionType;
    /** @var GatewayCriterion */
    private $gatewayCriterion;
    /** @var Member */
    private $member;
    /** @var Transaction */
    private $transaction;

    public function setUp()
    {
        parent::setUp();

        $this->criterionType = new EnrollmentDateCriterionType(new MathService());

        $operatorType = new OperatorType();
        $operatorType->setName(OperatorType::EQUAL);

        $criterionOperator = new GatewayCriterionOperator();
        $criterionOperator->setOperatorType($operatorType);

        $criterionValue = new GatewayCriterionValue();
        $criterionValue->setValue('2012-12-21 00:00:00');

        $this->gatewayCriterion = new GatewayCriterion();
        $this->gatewayCriterion
            ->setGatewayCriterionOperator($criterionOperator)
            ->setGatewayCriterionValue($criterionValue);

        $this->member = new Member();

        $user = new User();
        $user->addMember($this->member);

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
        $this->member->setCreatedAt(new \DateTime('2012-12-21 00:00:00'));

        $this->assertTrue($this->criterionType->evaluate($this->gatewayCriterion, $this->transaction));
    }

    /** @test */
    public function evaluate_false()
    {
        $this->member->setCreatedAt(new \DateTime('2012-12-20 00:00:00'));

        $this->assertFalse($this->criterionType->evaluate($this->gatewayCriterion, $this->transaction));
    }
}
