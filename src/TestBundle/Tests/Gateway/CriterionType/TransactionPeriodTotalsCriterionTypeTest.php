<?php

namespace TestBundle\Tests\Gateway\CriterionType;

use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_MockObject_Stub_Return;
use TestBundle\Gateway\CriterionType\TransactionPeriodTotalsCriterionType;
use TestBundle\Entity\Gateway;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\GatewayCriterionOperator;
use TestBundle\Entity\GatewayCriterionValue;
use TestBundle\Entity\OperatorType;
use TestBundle\Entity\PeriodType;
use TestBundle\Entity\Transaction;
use TestBundle\Service\MathService;
use TestBundle\Tests\BaseTestCase;
use TestBundle\Repository\TransactionRepository;

class TransactionPeriodTotalsCriterionTypeTest extends BaseTestCase
{
    /** @var TransactionPeriodTotalsCriterionType */
    private $criterionType;
    /** @var PHPUnit_Framework_MockObject_MockObject|TransactionRepository */
    private $mTransactionRepository;
    /** @var GatewayCriterion */
    private $gatewayCriterion;
    /** @var Transaction */
    private $transaction;

    public function setUp()
    {
        parent::setUp();

        $this->mTransactionRepository = $this->getMockEntityRepository('Transaction', ['getTotalsByPeriodType']);
        $this->criterionType = new TransactionPeriodTotalsCriterionType(new MathService(), $this->mTransactionRepository);

        $operatorType = new OperatorType();
        $operatorType->setName(OperatorType::LESS_THAN_OR_EQUAL);

        $criterionOperator = new GatewayCriterionOperator();
        $criterionOperator->setOperatorType($operatorType);

        $criterionValue = new GatewayCriterionValue();
        $criterionValue->setValue(123.00);

        $periodType = new PeriodType();
        $periodType->setName(PeriodType::DAY);

        $this->gatewayCriterion = new GatewayCriterion();
        $this->gatewayCriterion
            ->setPeriodType($periodType)
            ->setGateway(new Gateway())
            ->setGatewayCriterionOperator($criterionOperator)
            ->setGatewayCriterionValue($criterionValue);

        $this->transaction = new Transaction();
        $this->transaction->setAmount(123.00);
    }

    /** @test */
    public function evaluate_true()
    {
        $this->mTransactionRepository
            ->expects($this->once())
            ->method('getTotalsByPeriodType')
            ->will(new PHPUnit_Framework_MockObject_Stub_Return(
                0.00
            ));
//            ->willReturn(0.00);

        $this->assertTrue($this->criterionType->evaluate($this->gatewayCriterion, $this->transaction));
    }

    /** @test */
    public function evaluate_false()
    {
        $this->mTransactionRepository
            ->expects($this->once())
            ->method('getTotalsByPeriodType')
            ->will(new PHPUnit_Framework_MockObject_Stub_Return(
                124.00
            ));
//            ->willReturn(124.00);

        $this->assertFalse($this->criterionType->evaluate($this->gatewayCriterion, $this->transaction));
    }
}
