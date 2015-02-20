<?php

namespace TestBundle\Tests\Gateway\CriterionType;

use TestBundle\Gateway\CriterionType\RegionZoneCriterionType;
use TestBundle\Entity\Contact;
use TestBundle\Entity\ContactOrder;
use TestBundle\Entity\ContactOrderType;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Order;
use TestBundle\Entity\RegionZone;
use TestBundle\Entity\Transaction;
use TestBundle\Entity\User;

class RegionZoneCriterionTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var RegionZoneCriterionType */
    private $criterionType;
    /** @var GatewayCriterion */
    private $gatewayCriterion;
    /** @var RegionZone */
    private $regionZone;
    /** @var User */
    private $user;
    /** @var Transaction */
    private $transaction;

    public function setUp()
    {
        parent::setUp();

        $this->criterionType = new RegionZoneCriterionType();

        $this->regionZone = new RegionZone();
        $this->regionZone->setName('True RegionZone');

        $this->gatewayCriterion = new GatewayCriterion();
        $this->gatewayCriterion->addRegionZone($this->regionZone);

        $this->user = new User();

        $contact = new Contact();
        $contact->setUser($this->user);

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
        $this->user->setRegionZone($this->regionZone);

        $this->assertTrue($this->criterionType->evaluate($this->gatewayCriterion, $this->transaction));
    }

    /** @test */
    public function evaluate_false()
    {
        $regionZone = new RegionZone();
        $regionZone->setName('False RegionZone');

        $this->user->setRegionZone($regionZone);

        $this->assertFalse($this->criterionType->evaluate($this->gatewayCriterion, $this->transaction));
    }
}
